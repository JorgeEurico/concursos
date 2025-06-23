<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetenciasConcursoController extends Controller
{
    public function index()
    {
        $competenciasConcurso = CompetenciasConcurso::all();
        return view('competencias_concurso.index', compact('competenciasConcurso'));
    }

    public function create()
    {
        return view('competencias_concurso.create');
    }

    public function store(Request $request)
    {
        CompetenciasConcurso::create($request->all());
        return redirect()->route('competencias_concurso.index');
    }
}
