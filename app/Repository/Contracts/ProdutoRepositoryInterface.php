<?php

namespace App\Repository\Contracts;

use App\DTO\ProdutoDTO;

interface ProdutoRepositoryInterface
{
    public function inserir(ProdutoDTO $produtoDTO);
}
