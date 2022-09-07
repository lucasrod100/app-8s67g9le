<?php

namespace App\Repository\Contracts;

interface EstoqueRepositoryInterface
{
    public function criarEstoqueProduto(int $idProduto, int $quantidade);

    public function retornarEstoqueProdutoPorSKU(string $sku);

    public function atualizarEstoqueProduto(int $idEstoque, int $quantidade);
}
