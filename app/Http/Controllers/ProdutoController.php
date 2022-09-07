<?php

namespace App\Http\Controllers;

use App\Service\Contracts\ProdutoServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\DTO\ProdutoDTO;

class ProdutoController extends Controller
{
    /**
     * @var ProdutoServiceInterface
     */
    private ProdutoServiceInterface $produtoService;

    /**
     * @param ProdutoServiceInterface $produtoService
     */
    public function __construct(ProdutoServiceInterface $produtoService)
    {
        $this->produtoService = $produtoService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function inserirProduto(Request $request)
    {
        $produtoDTO = ProdutoDTO::factory($request->all());

        $produto = $this->produtoService->inserirProduto($produtoDTO);

        return response()->json($produto);
    }
}
