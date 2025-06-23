<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentSelection extends Model
{
    use HasFactory;
    protected $fillable = ['membro_juri_id', 'concurso_id'];
}
