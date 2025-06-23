<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembroJuri extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'patrimonio', 'email', 'projecto_id', 'tipo'];
    public function competencias()
    {
        return $this->belongsToMany(Competencia::class, 'competencias_membro', 'membro_id', 'competencia_id');
    }

    public function concursosJuri()
    {
        return $this->belongsToMany(Concurso::class, 'concurso_juri', 'membro_juri_id', 'concurso_id');
    }

    public function concursosComissao()
    {
        return $this->belongsToMany(Concurso::class, 'comissao_recepcao', 'membro_juri_id',  'concurso_id');
    }
    public function projecto()
    {
        return $this->belongsTo(Projecto::class);
    }


    public function totalConcursosParticipados()
    {
        // Mesclar as participações como júri e como comissão
        $concursos = $this->concursosJuri->merge($this->concursosComissao);

        // Garantir que os concursos sejam únicos e contar
        return $concursos->unique('id')->count();
    }
}
