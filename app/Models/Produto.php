<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'produto';

    /**
     * @var array
     */
    protected $fillable = ['sku', 'nome'];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function estoque()
    {
        return $this->hasMany(Estoque::class, 'id_produto', 'id');
    }
}
