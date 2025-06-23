<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MembroJuri;
use App\Models\Competencia;
use App\Models\Concurso;
use App\Models\Projecto;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacaoJuri;
use App\Http\Controllers\NotificacaoMembro;



class MembroJuriController extends Controller
{

    public function index()
    {
        $membros = MembroJuri::with(['competencias', 'projecto'])->get(); // Adicione 'projecto' aqui
        $competencias = Competencia::all();
        $projectos = Projecto::all();
        return view('configuracoes.membro', compact('membros', 'competencias', 'projectos'));
    }

    public function edit($id)
    {
        // Buscar o membro do júri pelo ID
        $membro = MembroJuri::findOrFail($id);

        // Buscar todas as competências e projetos disponíveis para preencher os selects
        $competencias = Competencia::all();
        $projectos = Projecto::all();

        // Retornar a view de edição com os dados do membro e as competências
        return view('configuracoes.editarMembro', compact('membro', 'competencias', 'projectos'));
    }

    public function update(Request $request, $id)
    {
        $membro = MembroJuri::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'patrimonio' => 'required|boolean',
            'email' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-çÇáàâãéèêíïóôõöúçñ]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/',
            ],
            'competencias' => 'required|array',
            'competencias.*' => 'exists:competencias,id',
            'projecto_id' => 'required|exists:projectos,id',
             'tipo' => 'required|string|max:255', // Tornando o campo 'projecto' obrigatório
        ]);
        
        $membro->update([
            'nome' => $request->nome,
            'patrimonio' => $request->patrimonio,
            'email' => $request->email,
            'projecto_id' => $request->projecto_id,
            'tipo' => $request->tipo // Salvando o projecto_id corretamente
        ]);
    
        $membro->competencias()->sync($request->competencias);
    
        return redirect()->route('configuracoes.membro')->with('success', 'Membro do júri atualizado com sucesso.');
    }

    public function pesquisar(Request $request)
    {
        $query = MembroJuri::query();
    
        // Verifica se há um termo de pesquisa
        if ($request->has('search')) {
            $term = $request->input('search');
            $query->where(function ($q) use ($term) {
                $q->where('nome', 'like', "%$term%")
                  ->orWhere('email', 'like', "%$term%");
            });
        }
    
        $membros = $query->with(['competencias', 'projecto'])->get(); // Adicionando o projeto aqui
    
        return view('configuracoes.membro', compact('membros'));
    }

    public function notificar(Request $request)
    {
        $concursoId = $request->input('concurso_id');
        $concurso = Concurso::findOrFail($concursoId);

        // Notificar membros do júri
        $membrosJuri = MembroJuri::whereHas('concursosJuri', function ($query) use ($concursoId) {
            $query->where('concurso_id', $concursoId);
        })->get();

        foreach ($membrosJuri as $membro) {
            if (filter_var($membro->email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($membro->email)->send(new NotificacaoJuri($membro, $concurso, 'juri'));
            }
        }

        // Notificar membros da comissão de recepção
        $membrosComissao = MembroJuri::whereHas('concursosComissao', function ($query) use ($concursoId) {
            $query->where('concurso_id', $concursoId);
        })->get();

        foreach ($membrosComissao as $membro) {
            if (filter_var($membro->email, FILTER_VALIDATE_EMAIL)) {
                Mail::to($membro->email)->send(new NotificacaoJuri($membro, $concurso, 'comissao'));
            }
        }

        return redirect()->back()->with('success', 'Notificações enviadas com sucesso.');
    }

    public function relatorio($membro_id)
{
    // Encontrar o membro pelo ID
    $membro = MembroJuri::findOrFail($membro_id);

    // Contar concursos que o membro participou e estão finalizados
    $concursosFinalizados = $membro->concursosJuri()
        ->where('status', 'terminado')
        ->count();

    // Contar concursos que o membro está a participar atualmente (status "a decorrer")
    $concursosAtuais = $membro->concursosJuri()
        ->where('status', 'a decorrer')
        ->count();

    // Concursos totais que o membro já participou
    $concursosTotais = $membro->concursosJuri()->count();
    $concursos = $membro->concursosJuri()->get();

    // Retornar os dados para a view
    return view('configuracoes.relatorioMembro', compact('membro', 'concursosFinalizados', 'concursosAtuais', 'concursosTotais','concursos'));
}

}



