<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use App\Models\Competencia;
Use App\Models\MembroJuri;
Use App\Models\Projecto;

class ConfiguracoesController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('configuracoes.index', compact('usuarios'));
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'is_admin' => 'required|string|max:255',
        ]);

        $user = User::find($request->user_id);
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect()->route('configuracoes')->with('success', 'Role do usuário atualizado com sucesso.');
    }
    public function editRole($id)
{
    $usuario = User::findOrFail($id);
    return view('configuracoes.editarRole', compact('usuario'));
}
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('configuracoes')->with('success', 'Usuário criado com sucesso.');
    }

    public function cadastrar(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'patrimonio' => 'nullable|boolean',
            'email' => 'required|email|max:255|unique:membro_juris,email',
            'competencias' => 'required|array',
            'competencias.*' => 'integer|exists:competencias,id',
            'projecto_id' => 'nullable|exists:projectos,id',
            'tipo' => 'required|string|max:255',
        ]);

        $membro = MembroJuri::create([
            'nome' => $request->nome,
            'patrimonio' => $request->has('patrimonio'),
            'email' => $request->email,
            'projecto_id' => $request->projecto,
            'tipo' => $request->input('tipo'),
        ]);

        $membro->competencias()->sync($request->competencias);

        return redirect()->route('configuracoes.membro')->with('success', 'Membro do júri cadastrado com sucesso.');
    }
    public function cadastrarMembro()
    {
        $competencias = Competencia::all(); // Supondo que você tenha um modelo Competencia
        $projectos = Projecto::all();
        return view('configuracoes.cadastrarMembro', compact('competencias', 'projectos'));
    }

    
}
