<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projecto;
use App\Models\Concurso; // Ajuste o caminho de acordo com sua estrutura de pastas



class ProjectoController extends Controller
{
    public function index()
    {
        $projectos = Projecto::all(); // Pega todos os projetos
        return view('projectos.index', compact('projectos'));
    }

    // Método para armazenar um novo projeto
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        // Criação do projeto
        Projecto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        // Retorna para a página com uma mensagem de sucesso
        return redirect()->route('projectos.index')->with('success', 'Projeto cadastrado com sucesso!');
    }
    public function create()
{
    return view('projectos.create'); // A view 'projectos.create' conterá o formulário de cadastro
}
}
