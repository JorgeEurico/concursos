<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;


class ConcursoJuri extends Pivot
{
    use HasFactory;
    protected $table = 'concurso_juri';
}

