<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MovimentacaoEstoque extends Model
{
    use HasFactory;

    const CREATED_AT = 'data_movimentacao';
    const UPDATED_AT = null;

    /**
     * Definição do nome da tabela.
     *
     * @var string
     */
    protected $table = 'movimentacao_estoque';

    /**
     * Chave primaria da tabela de produtos.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Atribuição em massa.
     *
     * @var array
     */
    protected $fillable = ['quantidade', 'id_estoque', 'id_tipo_movimentacao'];

    /**
     * @return BelongsTo
     */
    public function estoque()
    {
        return $this->belongsTo(Estoque::class, "id_estoque", "id", "estoque");
    }

    /**
     * @return BelongsTo
     */
    public function tipoMovimentacao()
    {
        return $this->belongsTo(TipoMovimentacao::class, "id_tipo_movimentacao", "id", "tipo_movimentacao");
    }
}
