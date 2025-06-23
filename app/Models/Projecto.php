<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        
    ];
    public function membroJuris()
    {
        return $this->hasMany(MembroJuri::class);
    }
    public function concursos()
{
    return $this->hasMany(Concurso::class); // Um projecto tem muitos concursos
}

}
