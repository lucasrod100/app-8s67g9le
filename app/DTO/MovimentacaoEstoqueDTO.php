<?php

namespace App\DTO;

use Illuminate\Support\Arr;
use JsonSerializable;

class MovimentacaoEstoqueDTO implements JsonSerializable
{
    /**
     * @var string|null
     */
    private string|null $sku;

    /**
     * @var mixed
     */
    private mixed $tipoMovimentacao;

    /**
     * @var mixed
     */
    private mixed $quantidade;

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     * @return MovimentacaoEstoqueDTO
     */
    public function setSku(?string $sku): MovimentacaoEstoqueDTO
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoMovimentacao(): mixed
    {
        return $this->tipoMovimentacao;
    }

    /**
     * @param mixed $tipoMovimentacao
     * @return MovimentacaoEstoqueDTO
     */
    public function setTipoMovimentacao(mixed $tipoMovimentacao): MovimentacaoEstoqueDTO
    {
        $this->tipoMovimentacao = $tipoMovimentacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantidade(): mixed
    {
        return $this->quantidade;
    }

    /**
     * @param mixed $quantidade
     * @return MovimentacaoEstoqueDTO
     */
    public function setQuantidade(mixed $quantidade): MovimentacaoEstoqueDTO
    {
        $this->quantidade = $quantidade;
        return $this;
    }

    /**
     * @param array $dados
     * @return MovimentacaoEstoqueDTO
     */
    public static function factory(array $dados)
    {
        $movimentacaoEstoqueDTO = new MovimentacaoEstoqueDTO();
        $movimentacaoEstoqueDTO->setSku(Arr::get($dados, 'sku'));
        $movimentacaoEstoqueDTO->setTipoMovimentacao(Arr::get($dados, 'tipoMovimentacao'));
        $movimentacaoEstoqueDTO->setQuantidade(Arr::get($dados, 'quantidade'));

        return $movimentacaoEstoqueDTO;
    }

    public function jsonSerialize()
    {
        $data = [];

        $this->getSku() !== null && $data['sku'] = $this->getSku();
        $this->getTipoMovimentacao() !== null && $data['tipoMovimentacao'] = $this->getTipoMovimentacao();
        $this->getQuantidade() !== null && $data['quantidade'] = $this->getQuantidade();

        return $data;
    }
}
