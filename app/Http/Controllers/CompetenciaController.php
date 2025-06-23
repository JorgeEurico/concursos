<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompetenciaController extends Controller
{
    public function index(){
        $competencias = Competencia::all();
        return view('competencias.index', compact('competencias'));
    }
    public function create(){
        return view('competencias.create');
    }
    public function store(Request $request){
        return redirect()->route('competencias.index');
    }
}

