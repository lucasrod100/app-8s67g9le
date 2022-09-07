<?php

namespace App\Http\Controllers;

use App\Service\Contracts\MovimentacaoEstoqueServiceInterface;
use Illuminate\Http\JsonResponse;

class MovimentacaoEstoqueController extends Controller
{
    /**
     * @var MovimentacaoEstoqueServiceInterface
     */
    private MovimentacaoEstoqueServiceInterface $movimentacaoEstoqueService;

    /**
     * @param MovimentacaoEstoqueServiceInterface $movimentacaoEstoqueService
     */
    public function __construct(MovimentacaoEstoqueServiceInterface $movimentacaoEstoqueService)
    {
        $this->movimentacaoEstoqueService = $movimentacaoEstoqueService;
    }

    /**
     * @return JsonResponse
     */
    public function retornarHistoricoMovimentacao()
    {
        $historico = $this->movimentacaoEstoqueService->retornarHistoricoMovimentacaoEstoqueProduto();

        return response()->json($historico);
    }
}
