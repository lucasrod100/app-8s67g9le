<?php

namespace App\Service;

use App\Service\Contracts\MovimentacaoEstoqueServiceInterface;
use App\Repository\Contracts\EstoqueRepositoryInterface;
use App\Service\Contracts\EstoqueServiceInterface;
use Illuminate\Support\Facades\Validator;
use App\DTO\MovimentacaoEstoqueDTO;
use App\Enum\TipoMovimentacaoEnum;

class EstoqueService implements EstoqueServiceInterface
{
    /**
     * @var EstoqueRepositoryInterface
     */
    private EstoqueRepositoryInterface $estoqueRepository;

    /**
     * @var MovimentacaoEstoqueServiceInterface
     */
    private MovimentacaoEstoqueServiceInterface $movimentacaoEstoqueService;

    /**
     * @param EstoqueRepositoryInterface $estoqueRepository
     * @param MovimentacaoEstoqueServiceInterface $movimentacaoEstoqueService
     */
    public function __construct(
        EstoqueRepositoryInterface $estoqueRepository,
        MovimentacaoEstoqueServiceInterface $movimentacaoEstoqueService
    ) {
        $this->estoqueRepository = $estoqueRepository;
        $this->movimentacaoEstoqueService = $movimentacaoEstoqueService;
    }

    /**
     * @param int $idProduto
     * @param int $quantidade
     * @return mixed
     */
    public function criarEstoqueInicial(int $idProduto, int $quantidade)
    {
        return $this->estoqueRepository->criarEstoqueProduto($idProduto, $quantidade);
    }

    /**
     * @param MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO
     * @return mixed
     * @throws \Exception
     */
    public function movimentarProdutoEstoque(MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO)
    {
        $estoque = false;

        $this->validarCamposObrigatorios($movimentacaoEstoqueDTO);

        if ($movimentacaoEstoqueDTO->getTipoMovimentacao() == TipoMovimentacaoEnum::MOVIMENTACAO_ADICIONAR) {
            $estoque = $this->adicionarEstoqueProduto($movimentacaoEstoqueDTO);
        }

        if ($movimentacaoEstoqueDTO->getTipoMovimentacao() == TipoMovimentacaoEnum::MOVIMENTACAO_REMOVER) {
            $estoque = $this->removerEstoqueProduto($movimentacaoEstoqueDTO);
        }

        if ($estoque) {
            $this->movimentacaoEstoqueService->gerarHistoricoMovimentacaoEstoqueProduto($estoque->id, $movimentacaoEstoqueDTO);
        }

        return $estoque;
    }

    /**
     * @param MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO
     * @throws \Exception
     */
    public function validarCamposObrigatorios(MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO)
    {
        $data = $movimentacaoEstoqueDTO->jsonSerialize();

        $messages = array(
            'required'    => 'O atributo :attribute é obrigatorio.',
            'integer'    => 'O :attribute deve ser fornecido um numero inteiro',
        );

        $validator = Validator::make($data, [
            'sku' => 'required',
            'tipoMovimentacao' => 'required|integer',
            'quantidade' => 'required|integer'
        ], $messages);

        if ($validator->fails()) {
            throw new \Exception($validator->messages());
        }
    }

    /**
     * @param MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO
     * @return mixed
     */
    public function adicionarEstoqueProduto(MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO)
    {
        $estoque = $this->estoqueRepository->retornarEstoqueProdutoPorSKU($movimentacaoEstoqueDTO->getSku());

        $quantidade = $estoque->quantidade + $movimentacaoEstoqueDTO->getQuantidade();

        return $this->estoqueRepository->atualizarEstoqueProduto($estoque->id, $quantidade);
    }

    /**
     * @param MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO
     * @return mixed
     * @throws \Exception
     */
    public function removerEstoqueProduto(MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO)
    {
        $estoque = $this->estoqueRepository->retornarEstoqueProdutoPorSKU($movimentacaoEstoqueDTO->getSku());

        if ($movimentacaoEstoqueDTO->getQuantidade() > $estoque->quantidade) {
            throw new \Exception("Quantidade solicitada indisponível para remoção do estoque");
        }

        $quantidade = $estoque->quantidade - $movimentacaoEstoqueDTO->getQuantidade();

        return $this->estoqueRepository->atualizarEstoqueProduto($estoque->id, $quantidade);
    }

}
