<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencia extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao'];

    public function competencias()
    {
        return $this->belongsToMany(Competencia::class, 'competencias_concurso', 'concurso_id', 'competencia_id');
    }

    public function juri()
    {
        return $this->belongsToMany(MembroJuri::class, 'concurso_juri', 'concurso_id', 'membro_juri_id');
    }

    public function comissaoRecepcao()
    {
        return $this->belongsToMany(MembroJuri::class, 'comissao_recepcao', 'concurso_id', 'membro_id');
    }
}
