<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Concurso extends Model
{
    protected $fillable = ['nome', 'descricao', 'local','data','status', 'projecto' ];

    public function competencias()
    {
        return $this->belongsToMany(Competencia::class, 'competencias_concurso');
    }

    public function jurados()
    {
        return $this->belongsToMany(MembroJuri::class, 'concurso_juri', 'concurso_id', 'membro_juri_id')->withPivot('funcao');
    }

    public function comissaoRecepcao()
    {
        return $this->belongsToMany(MembroJuri::class, 'comissao_recepcao','concurso_id', 'membro_juri_id');
    }
    public function projecto()
{
    return $this->belongsTo(Projecto::class);
}

}
