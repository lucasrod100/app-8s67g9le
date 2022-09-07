<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimentacao extends Model
{
    use HasFactory;

    /**
     * Definição do nome da tabela.
     *
     * @var string
     */
    protected $table = 'tipo_movimentacao';

    /**
     * Atribuição em massa.
     *
     * @var array
     */
    protected $fillable = ['nome'];
}
