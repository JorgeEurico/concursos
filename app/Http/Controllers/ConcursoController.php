<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concurso;
use App\Models\Competencia;
use App\Models\CompetenciasConcurso;
use App\Models\CompetenciasMembro;
use App\Models\MembroJuri;
use App\Models\ConcursoJuri;
use App\Models\ComissaoRecepcao;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Projecto;

class ConcursoController extends Controller
{
    public function carregarCompetencias()
    {
        $competencias = Competencia::all(['id', 'descricao']);
        $projectos = Projecto::all(); 
        return view('admin.home', compact('competencias', 'projecto'));
    }
    public function carregarprojectos()
    {
        $projectos = Projecto::all(); // Carregar todos os projetos
        return view('admin.home', compact('projectos', 'competencias'));
    }
    public function show($id)
    {
        $concurso = Concurso::with(['competencias', 'jurados', 'comissaoRecepcao'])->find($id);

        $concurso = Concurso::with('jurados.projecto')->findOrFail($id);

        // Buscar membros da UGEA (assumindo que são armazenados na tabela `membros` com uma condição específica)
        $membrosUgea = MembroJuri::where('tipo', 'UGEAMember')->get(); // a
        return view('show', compact('concurso', 'membrosUgea'));
    }

    public function obterDetalhesConcurso($concurso_id)
    {
        $concurso = Concurso::with('competencias')->find($concurso_id);

        if ($concurso) {
            return response()->json($concurso);
        } else {
            return response()->json(['message' => 'Concurso não encontrado.'], 404);
        }
    }
     public function criarConcurso(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'local' => 'required|string|max:255',
            'data' => 'required|date',
            'competencias' => 'required|array',
            'competencias.*' => 'integer|exists:competencias,id',
            'projecto' => 'required|integer|exists:projectos,id',  // Verifica se o projecto existe
        ]);
    
        // Criar novo concurso e associar ao projecto
        $concurso = new Concurso();
        $concurso->nome = $request->nome;
        $concurso->descricao = $request->descricao;
        $concurso->local = $request->local;
        $concurso->data = $request->data;
        $concurso->projecto_id = $request->projecto;  // Associa o concurso ao projecto corretamente
    
        // Define o status como 'a decorrer'
        $concurso->status = 'a decorrer';
        $concurso->save();
    
        // Adicionar as competências selecionadas
        $concurso->competencias()->attach($request->competencias);
        $this->selecionarJuri($concurso->id);
    
        return redirect()->route('admin.home')->with('success', 'Concurso criado com sucesso.');
           
    }

    public function selecionarJuri($concurso_id)
    {
        // Obter a competência requerida para o concurso
        $competenciaRequerida = DB::table('competencias_concurso')
            ->where('concurso_id', $concurso_id)
            ->pluck('competencia_id')
            ->first();
    
        if (!$competenciaRequerida) {
            return response()->json(['message' => 'Competência não encontrada para este concurso.'], 404);
        }
    
        // Priorizar seleção de membros do projeto associado ao concurso
        $concurso = Concurso::findOrFail($concurso_id);
        $projeto_id = $concurso->projecto_id;
    
        // Verificar se a competência é 22 e o projeto é 52
        if ($competenciaRequerida == 22 && $projeto_id == 52) {
            // Selecionar 2 jurados, 2 membros para a comissão de recepção e 1 membro do patrimônio
            $membrosJuri = MembroJuri::where('projecto_id', $projeto_id)
                ->whereHas('competencias', function ($query) use ($competenciaRequerida) {
                    $query->where('competencia_id', $competenciaRequerida);
                })
                ->inRandomOrder()
                ->limit(2)
                ->get();
    
            // Selecionar 2 membros da comissão de recepção
            $membrosComissao = MembroJuri::whereHas('competencias', function ($query) use ($competenciaRequerida) {
                $query->where('competencia_id', $competenciaRequerida);
            })
            ->where('projecto_id', $projeto_id)
            ->inRandomOrder()
            ->limit(2)
            ->get();
    
            // Selecionar 1 membro do patrimônio
            $patrimonioMembro = MembroJuri::where('patrimonio', 1)->inRandomOrder()->first();
    
            if (!$patrimonioMembro) {
                return response()->json(['message' => 'Não foi possível encontrar um membro do patrimônio.'], 404);
            }
    
            // Iniciar uma transação para associar os membros ao concurso
            DB::transaction(function () use ($concurso, $membrosJuri, $patrimonioMembro, $membrosComissao) {
                // Associar membros do júri ao concurso
                foreach ($membrosJuri as $membro) {
                    $concurso->jurados()->attach($membro->id);
                    $membro->update(['disponivel' => 1]);
                }
    
                // Associar membros da comissão de recepção ao concurso
                foreach ($membrosComissao as $membro) {
                    $concurso->comissaoRecepcao()->attach($membro->id);
                    $membro->update(['disponivel' => 1]);
                }
    
                // Adicionar o membro do patrimônio à comissão de recepção
                $concurso->comissaoRecepcao()->attach($patrimonioMembro->id);
                $patrimonioMembro->update(['disponivel' => 1]);
            });
    
            // Construir os arrays de membros do júri e da comissão de recepção sem incluir os emails
            $juradosArray = $membrosJuri->map(function($membro) {
                return [
                    'id' => $membro->id,
                    'nome' => $membro->nome,
                ];
            });
    
            $comissaoArray = $membrosComissao->map(function($membro) {
                return [
                    'id' => $membro->id,
                    'nome' => $membro->nome,
                ];
            })->push([
                'id' => $patrimonioMembro->id,
                'nome' => $patrimonioMembro->nome,
            ]);
    
            return response()->json([
                'message' => 'Jurados e comissão de recepção selecionados e associados ao concurso com sucesso.',
                'jurados' => $juradosArray,
                'comissao' => $comissaoArray,
            ]);
        }
    
        // Caso contrário, continue o processo anterior
        // Competência requerida e projeto não são 22 e 52
        // Obter o investigador principal
        $competenciaInvestigadorPrincipal = [29,23]; 
        $investigadorPrincipal = MembroJuri::where('projecto_id', $projeto_id)
            ->whereHas('competencias', function ($query) use ($competenciaInvestigadorPrincipal) {
                $query->where('competencia_id', $competenciaInvestigadorPrincipal);
            })
            ->first();
    
        if (!$investigadorPrincipal) {
            return response()->json(['message' => 'Investigador principal não encontrado para este projeto.'], 404);
        }
    
        // Selecionar outro membro do projeto com a competência requerida
        $membrosJuri = MembroJuri::where('projecto_id', $projeto_id)
            ->whereHas('competencias', function ($query) use ($competenciaRequerida) {
                $query->where('competencia_id', $competenciaRequerida);
            })
            ->where('id', '!=', $investigadorPrincipal->id)
            ->inRandomOrder()
            ->limit(1)
            ->get();
    
        // Adicionar o investigador principal aos membros do júri
        $membrosJuri->prepend($investigadorPrincipal);
    
        // Se não houver membros qualificados suficientes, selecionar membros fora do projeto com a competência necessária
        if ($membrosJuri->count() < 4) {
            $faltando = 4 - $membrosJuri->count();
            $membrosAdicionais = MembroJuri::whereHas('competencias', function ($query) use ($competenciaRequerida) {
                    $query->where('competencia_id', $competenciaRequerida);
                })
                ->where('projecto_id', '!=', $projeto_id)
                ->inRandomOrder()
                ->limit($faltando)
                ->get();
    
            // Mesclar os membros qualificados do projeto com os adicionais
            $membrosJuri = $membrosJuri->merge($membrosAdicionais);
        }
    
        // Selecionar um membro do patrimônio para a comissão de recepção
        $patrimonioMembro = MembroJuri::where('patrimonio', 1)->inRandomOrder()->first();
    
        if (!$patrimonioMembro) {
            return response()->json(['message' => 'Não foi possível encontrar um membro do patrimônio.'], 404);
        }
    
        // Selecionar mais dois membros para a comissão de recepção com base na competência requerida, excluindo os membros do júri e o membro do patrimônio
        $membrosComissao = MembroJuri::whereHas('competencias', function ($query) use ($competenciaRequerida) {
            $query->where('competencia_id', $competenciaRequerida);
        })
        ->whereNotIn('id', $membrosJuri->pluck('id')->push($patrimonioMembro->id))
        ->inRandomOrder()
        ->limit(2)
        ->get();
    
        // Se não houver membros qualificados suficientes para a comissão, selecionar membros aleatórios
        if ($membrosComissao->count() < 2) {
            $faltando = 2 - $membrosComissao->count();
            $membrosAdicionais = MembroJuri::whereNotIn('id', $membrosComissao->pluck('id')->merge($membrosJuri->pluck('id'))->push($patrimonioMembro->id))
                ->inRandomOrder()
                ->limit($faltando)
                ->get();
            $membrosComissao = $membrosComissao->merge($membrosAdicionais);
        }
    
        // Iniciar uma transação para associar os membros ao concurso
        DB::transaction(function () use ($concurso, $membrosJuri, $patrimonioMembro, $membrosComissao) {
            // Associar membros do júri ao concurso
            foreach ($membrosJuri as $membro) {
                $concurso->jurados()->attach($membro->id);
                $membro->update(['disponivel' => 1]);
            }
    
            // Associar membros da comissão de recepção ao concurso
            foreach ($membrosComissao as $membro) {
                $concurso->comissaoRecepcao()->attach($membro->id);
                $membro->update(['disponivel' => 1]);
            }
    
            // Adicionar o membro do patrimônio à comissão de recepção
            $concurso->comissaoRecepcao()->attach($patrimonioMembro->id);
            $patrimonioMembro->update(['disponivel' => 1]);
        });
    
        // Construir os arrays de membros do júri e da comissão de recepção sem incluir os emails
        $juradosArray = $membrosJuri->map(function($membro) {
            return [
                'id' => $membro->id,
                'nome' => $membro->nome,
            ];
        });
    
        $comissaoArray = $membrosComissao->map(function($membro) {
            return [
                'id' => $membro->id,
                'nome' => $membro->nome,
            ];
        })->push([
            'id' => $patrimonioMembro->id,
            'nome' => $patrimonioMembro->nome,
        ]);
        
        return response()->json([
            'message' => 'Jurados e comissão de recepção selecionados e associados ao concurso com sucesso.',
            'jurados' => $juradosArray,
            'comissao' => $comissaoArray,
        ]);
        
    }
    
    
    

    

   

   

    public function finalizarConcurso($concurso_id)
{
    $concurso = Concurso::find($concurso_id);

    // Verifique se o concurso foi encontrado e se o status não é "terminado"
    if ($concurso && $concurso->status !== 'terminado') {
        // Atualizar o status do concurso para "terminado"
        $concurso->update(['status' => 'terminado']);

        // Atualizar a disponibilidade dos membros do júri e comissão de recepção para 0
        $membrosJuri = $concurso->jurados;
        $membrosComissao = $concurso->comissaoRecepcao;

        foreach ($membrosJuri as $membro) {
            $membro->update(['disponivel' => 0]);
        }

        foreach ($membrosComissao as $membro) {
            $membro->update(['disponivel' => 0]);
        }

        return redirect()->route('admin.home')->with('success', 'Concurso finalizado e disponibilidade dos membros atualizada.');
    }

    return redirect()->route('admin.home')->with('error', 'Concurso não encontrado ou já está finalizado.');
}

     
    
    



public function obterMembrosJuri($concurso_id)
{
    // Verifica se o concurso existe
    $concurso = Concurso::find($concurso_id);
    if (!$concurso) {
        return response()->json(['message' => 'Concurso não encontrado.'], 404);
    }

    // Obtem os membros do júri associados ao concurso, incluindo o projeto
    $membros = MembroJuri::join('concurso_juri', 'membro_juris.id', '=', 'concurso_juri.membro_juri_id')
        ->leftJoin('projectos', 'membro_juris.projecto_id', '=', 'projectos.id') // Inclui o projeto associado
        ->where('concurso_juri.concurso_id', $concurso_id)
        ->select('membro_juris.id', 'membro_juris.nome', 'projectos.nome as nome_projecto') // Inclui o nome do projeto
        ->get();

    // Verifica se há membros do júri associados
    if ($membros->isEmpty()) {
        return response()->json(['message' => 'Nenhum membro do júri encontrado para este concurso.'], 404);
    }

    // Retorna os membros do júri com o projeto associado em formato JSON
    return response()->json($membros);
}

public function listarConcursos()
{
    $concursos = Concurso::all();
    return response()->json($concursos);
}

public function adminHome()
{
    $concursos = Concurso::with('projecto')->get();
    $concursos = Concurso::all();
    $competencias = Competencia::all();
    $projectos = Projecto::all(); 
    return view('admin-home', compact('concursos', 'competencias', 'projectos'));
}

public function obterUltimoConcursoId()
{
    $ultimoConcurso = Concurso::latest('id')->first(['id']);
    return response()->json($ultimoConcurso);
}

public function deletarConcurso($concurso_id)
{
    try {
        DB::transaction(function () use ($concurso_id) {
            ConcursoJuri::where('concurso_id', $concurso_id)->delete();
            ComissaoRecepcao::where('concurso_id', $concurso_id)->delete();
            Concurso::destroy($concurso_id);
        });

        return response()->json(['message' => 'Concurso deletado com sucesso.']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Erro ao deletar concurso.', 'error' => $e->getMessage()], 500);
    }
}

public function listarConcursosComPesquisa(Request $request)
{
    $searchTerm = $request->input('searchTerm', '');
    $concursos = Concurso::query()
        ->where('nome', 'LIKE', "%{$searchTerm}%")
        ->orWhere('descricao', 'LIKE', "%{$searchTerm}%")
        ->get(['id', 'nome', 'descricao']);

    return response()->json($concursos);
}

// app/Http/Controllers/ConcursoController.php
public function update(Request $request, $id)
{
    // Validação dos dados do formulário de edição (se necessário)

    // Busca o concurso pelo ID
    $concurso = Concurso::findOrFail($id);

    // Atualiza os campos do concurso com base nos dados do formulário
    $concurso->nome = $request->input('nome');
    $concurso->descricao = $request->input('descricao');
    // Outros campos que você precisa atualizar

    // Salva as alterações no concurso
    $concurso->save();

    // Obtém a competência requerida do concurso
    $competenciaRequerida = $request->input('competencia_id');

    // Seleciona um membro da UGEA para o júri
    $ugeaMembro = MembroJuri::where('ugea', 1)->inRandomOrder()->first();

    if ($ugeaMembro) {
        // Atualiza o membro da UGEA no júri do concurso
        $concurso->jurados()->sync([$ugeaMembro->id]);
    }

    // Seleciona mais dois membros do júri com base na competência requerida
    $outrosMembrosJuri = MembroJuri::whereHas('competencias', function ($query) use ($competenciaRequerida) {
        $query->where('competencia_id', $competenciaRequerida);
    })->where('id', '!=', $ugeaMembro->id)->inRandomOrder()->limit(2)->get();

    if ($outrosMembrosJuri->isNotEmpty()) {
        $concurso->jurados()->syncWithoutDetaching($outrosMembrosJuri->pluck('id')->toArray());
    }

    // Seleciona três membros para a comissão de recepção com base nas competências requeridas
    $membrosComissao = MembroJuri::whereHas('competencias', function ($query) use ($competenciaRequerida) {
        $query->where('competencia_id', $competenciaRequerida);
    })->inRandomOrder()->limit(3)->get();

    if ($membrosComissao->isNotEmpty()) {
        $concurso->comissaoRecepcao()->sync($membrosComissao->pluck('id')->toArray());
    }

    // Retorna uma resposta de sucesso
    return redirect()->route('concursos.show', $concurso->id)->with('success', 'Concurso atualizado com sucesso!');;
}

// No método que abre a modal de edição
public function edit($id)
{
    $concurso = Concurso::findOrFail($id);
    $competencias = Competencia::all(); // Carregar todas as competências disponíveis

    return view('edit_concurso', compact('concurso', 'competencias'));
}

public function alterarStatus(Request $request, $id)
{
    // Encontrar o concurso pelo ID
    $concurso = Concurso::findOrFail($id);

    // Atualizar o status do concurso
    $concurso->status = $request->input('status');
    $concurso->save();

    // Retornar a resposta com uma mensagem de sucesso
    return redirect()->back()->with('success', 'O status do concurso foi atualizado com sucesso.');
}

public function estatisticas()
{
    $concursos = Concurso::all();
     // Contar o total de concursos criados
     $totalConcursos = Concurso::count();

     // Contar o número de concursos abertos
     $concursosAbertos = Concurso::where('status', 'aberto')->count();
 
     // Contar o número de concursos fechados
     $concursosFechados = Concurso::where('status', 'fechado')->count();
 
     // Contar o número de concursos cancelados
     $concursosCancelados = Concurso::where('status', 'cancelado')->count();

     $concursosTerminados = Concurso::Where('status', 'terminado')->count();
   

 
     // Obter todas as competências
     $competencias = Competencia::all();
     $projectos = Projecto::all();
     
 
     // Passar os dados para a view
     return view('admin-home', compact('totalConcursos', 'concursosAbertos', 'concursosFechados', 'concursosCancelados','concursosTerminados', 'competencias', 'concursos', 'projectos'));
}

public function updateJurados(Request $request, $id)
{
    $concurso = Concurso::findOrFail($id);

    // Validação dos dados recebidos
    $validatedData = $request->validate([
        'jurado_id' => 'required|exists:membro_juris,id',
        'funcao' => 'required|string',
    ]);

   

    // Atualizar a função do jurado no relacionamento many-to-many
    $concurso->jurados()->updateExistingPivot($validatedData['jurado_id'], ['funcao' => $validatedData['funcao']]);

    return redirect()->route('concursos.show', $id)
                     ->with('success', 'Função do jurado atualizada com sucesso!')->with('jurados', $concurso->jurados);;





}
public function addMembroUgea(Request $request, $id)
{
    $concurso = Concurso::findOrFail($id);

    // Validação do membro da UGEA
    $validatedData = $request->validate([
        'membro_ugea_id' => 'required|exists:membro_juris,id'
    ]);

    // Adicionar ou atualizar o membro da UGEA como 'Relator' na tabela pivot
    $concurso->jurados()->syncWithoutDetaching([
        $validatedData['membro_ugea_id'] => ['funcao' => 'Relator']
    ]);

    return redirect()->route('concursos.show', $id)
                     ->with('success', 'Membro da UGEA adicionado com sucesso como Relator!');
}


}