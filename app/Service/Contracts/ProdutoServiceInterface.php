<?php

namespace App\Service\Contracts;

use App\DTO\ProdutoDTO;

interface ProdutoServiceInterface
{
    public function inserirProduto(ProdutoDTO $produtoDTO): mixed;

    public function validarDadosInsercaoProduto(ProdutoDTO $produtoDTO);
}
