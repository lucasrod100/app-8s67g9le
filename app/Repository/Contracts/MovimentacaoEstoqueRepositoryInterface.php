<?php

namespace App\Repository\Contracts;

use App\DTO\MovimentacaoEstoqueDTO;

interface MovimentacaoEstoqueRepositoryInterface
{
    public function salvarHistorico(int $idEstoque, MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO);

    public function retornarHistorico();
}
