<?php

namespace App\Service\Contracts;

use App\DTO\MovimentacaoEstoqueDTO;

interface MovimentacaoEstoqueServiceInterface
{
    public function gerarHistoricoMovimentacaoEstoqueProduto(
        int $idEstoque, MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO
    );

    public function retornarHistoricoMovimentacaoEstoqueProduto();
}
