<?php

namespace App\Service;

use App\Repository\Contracts\MovimentacaoEstoqueRepositoryInterface;
use App\Service\Contracts\MovimentacaoEstoqueServiceInterface;
use App\DTO\MovimentacaoEstoqueDTO;

class MovimentacaoEstoqueService implements MovimentacaoEstoqueServiceInterface
{
    /**
     * @var MovimentacaoEstoqueRepositoryInterface
     */
    private MovimentacaoEstoqueRepositoryInterface $movimentacaoEstoqueRepository;

    /**
     * @param MovimentacaoEstoqueRepositoryInterface $movimentacaoEstoqueRepository
     */
    public function __construct(MovimentacaoEstoqueRepositoryInterface $movimentacaoEstoqueRepository)
    {
        $this->movimentacaoEstoqueRepository = $movimentacaoEstoqueRepository;
    }

    /**
     * @param int $idEstoque
     * @param MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO
     * @return mixed
     */
    public function gerarHistoricoMovimentacaoEstoqueProduto(
        int $idEstoque, MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO
    ) {
       return $this->movimentacaoEstoqueRepository->salvarHistorico($idEstoque, $movimentacaoEstoqueDTO);
    }

    public function retornarHistoricoMovimentacaoEstoqueProduto()
    {
        return $this->movimentacaoEstoqueRepository->retornarHistorico();
    }
}
