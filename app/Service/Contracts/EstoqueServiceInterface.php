<?php

namespace App\Service\Contracts;

use App\DTO\MovimentacaoEstoqueDTO;

interface EstoqueServiceInterface
{
    public function criarEstoqueInicial(int $idProduto, int $quantidade);

    public function movimentarProdutoEstoque(MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO);

    public function validarCamposObrigatorios(MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO);

    public function adicionarEstoqueProduto(MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO);

    public function removerEstoqueProduto(MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO);
}
