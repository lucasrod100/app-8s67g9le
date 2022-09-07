<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estoque extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'estoque';

    /**
     * @var array
     */
    protected $fillable = ['quantidade', 'id_produto'];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class, "id_produto", "id", "produto");
    }

    /**
     * @return HasMany
     */
    public function movimentacaoEstoque()
    {
        return $this->hasMany(MovimentacaoEstoque::class, 'id_estoque', 'id');
    }
}
