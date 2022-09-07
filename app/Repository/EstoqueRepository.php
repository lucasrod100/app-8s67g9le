<?php

namespace App\Repository;

use App\Repository\Contracts\EstoqueRepositoryInterface;
use App\Models\Estoque;

class EstoqueRepository implements EstoqueRepositoryInterface
{
    /**
     * @param int $idProduto
     * @param int $quantidade
     * @return mixed
     */
    public function criarEstoqueProduto(int $idProduto, int $quantidade)
    {
        return Estoque::create([
            "id_produto" => $idProduto,
            "quantidade" => $quantidade
        ]);
    }

    /**
     * @param string $sku
     * @return mixed
     */
    public function retornarEstoqueProdutoPorSKU(string $sku)
    {
        return Estoque::whereHas('produto', function($q) use ($sku){
            $q->where('sku', $sku);
        })->first();
    }

    /**
     * @param int $idEstoque
     * @param int $quantidade
     * @return mixed
     */
    public function atualizarEstoqueProduto(int $idEstoque, int $quantidade)
    {
        $estoque = Estoque::where('id', $idEstoque)->first();
        $estoque->fill(['quantidade' => $quantidade]);
        $estoque->save();

        return $estoque;
    }
}
