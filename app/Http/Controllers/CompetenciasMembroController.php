<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetenciasMembroController extends Controller
{
    public function index()
    {
        $competenciasMembro = CompetenciasMembro::all();
        return view('competencias_membro.index', compact('competenciasMembro'));
    }

    public function create()
    {
        return view('competencias_membro.create');
    }

    public function store(Request $request)
    {
        CompetenciasMembro::create($request->all());
        return redirect()->route('competencias_membro.index');
    }
}
