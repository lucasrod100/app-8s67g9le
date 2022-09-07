<?php

namespace App\Service;

use App\Repository\Contracts\ProdutoRepositoryInterface;
use App\Service\Contracts\EstoqueServiceInterface;
use App\Service\Contracts\ProdutoServiceInterface;
use Illuminate\Support\Facades\Validator;
use App\DTO\ProdutoDTO;

class ProdutoService implements ProdutoServiceInterface
{
    /**
     * @var ProdutoRepositoryInterface
     */
    private ProdutoRepositoryInterface $produtoRepository;

    /**
     * @var EstoqueServiceInterface
     */
    private EstoqueServiceInterface $estoqueService;

    /**
     * @param ProdutoRepositoryInterface $produtoRepository
     * @param EstoqueServiceInterface $estoqueService
     */
    public function __construct(ProdutoRepositoryInterface $produtoRepository, EstoqueServiceInterface $estoqueService)
    {
        $this->produtoRepository = $produtoRepository;
        $this->estoqueService = $estoqueService;
    }

    /**
     * @param ProdutoDTO $produtoDTO
     * @return mixed
     * @throws \Exception
     */
    public function inserirProduto(ProdutoDTO $produtoDTO): mixed
    {
        $this->validarDadosInsercaoProduto($produtoDTO);

        $produto = $this->produtoRepository->inserir($produtoDTO);

        $this->estoqueService->criarEstoqueInicial($produto->id, $produtoDTO->getQuantidadeInicial());

        return $produto;
    }

    /**
     * @param ProdutoDTO $produtoDTO
     * @throws \Exception
     */
    public function validarDadosInsercaoProduto(ProdutoDTO $produtoDTO)
    {
        $data = $produtoDTO->jsonSerialize();

        $messages = array(
            'required'    => 'O atributo :attribute é obrigatorio.',
            'unique'    => 'O produto com esse :attribute ja existe',
            'integer'    => 'O :attribute deve ser fornecido um numero inteiro',
        );

        $validator = Validator::make($data, [
            'nome' => 'required|max:255',
            'sku' => 'required|unique:produto|max:50',
            'quantidadeInicial' => 'required|integer',
        ], $messages);

        if ($validator->fails()) {
            throw new \Exception($validator->messages());
        }
    }
}
