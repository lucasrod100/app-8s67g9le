<?php

namespace App\Http\Controllers;

use App\Service\Contracts\EstoqueServiceInterface;
use App\DTO\MovimentacaoEstoqueDTO;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    /**
     * @var EstoqueServiceInterface
     */
    private EstoqueServiceInterface $estoqueService;

    /**
     * @param EstoqueServiceInterface $estoqueService
     */
    public function __construct(EstoqueServiceInterface $estoqueService)
    {
        $this->estoqueService = $estoqueService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function movimentarProdutoEstoque(Request $request)
    {
        $movimentacaoProdutoDTO = MovimentacaoEstoqueDTO::factory($request->all());

        $estoque = $this->estoqueService->movimentarProdutoEstoque($movimentacaoProdutoDTO);

        return response()->json($estoque);
    }
}
