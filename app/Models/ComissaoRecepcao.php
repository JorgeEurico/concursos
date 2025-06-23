<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;


class ComissaoRecepcao extends Pivot
{
    use HasFactory;
    protected $table = 'comissao_recepcao';
}
