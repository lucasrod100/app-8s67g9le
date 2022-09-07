<?php

namespace App\Repository;

use App\Repository\Contracts\ProdutoRepositoryInterface;
use App\DTO\ProdutoDTO;
use App\Models\Produto;

class ProdutoRepository implements  ProdutoRepositoryInterface
{
    /**
     * @param ProdutoDTO $produtoDTO
     * @return mixed
     */
    public function inserir(ProdutoDTO $produtoDTO)
    {
        return Produto::create([
            "nome" => $produtoDTO->getNome(),
            "sku" => $produtoDTO->getSku()
        ]);
    }
}
