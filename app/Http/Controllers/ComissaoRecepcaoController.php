<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComissaoRecepcaoController extends Controller
{
    public function index()
    {
        $comissaoRecepcao = ComissaoRecepcao::all();
        return view('comissao_recepcao.index', compact('comissaoRecepcao'));
    }

    public function create()
    {
        return view('comissao_recepcao.create');
    }

    public function store(Request $request)
    {
        ComissaoRecepcao::create($request->all());
        return redirect()->route('comissao_recepcao.index');
    }
}
