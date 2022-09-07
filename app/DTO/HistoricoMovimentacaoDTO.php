<?php

namespace App\DTO;

use Illuminate\Support\Arr;
use JsonSerializable;

class HistoricoMovimentacaoDTO implements JsonSerializable
{
    /**
     * @var string|null
     */
    private string|null $sku;

    /**
     * @var int|null
     */
    private int|null $quantidade;

    /**
     * @var string|null
     */
    private string|null $tipoMovimentacao;

    /**
     * @var mixed
     */
    private mixed $dataMovimentacao;

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     * @return HistoricoMovimentacaoDTO
     */
    public function setSku(?string $sku): HistoricoMovimentacaoDTO
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantidade(): ?int
    {
        return $this->quantidade;
    }

    /**
     * @param int|null $quantidade
     * @return HistoricoMovimentacaoDTO
     */
    public function setQuantidade(?int $quantidade): HistoricoMovimentacaoDTO
    {
        $this->quantidade = $quantidade;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTipoMovimentacao(): ?string
    {
        return $this->tipoMovimentacao;
    }

    /**
     * @param string|null $tipoMovimentacao
     * @return HistoricoMovimentacaoDTO
     */
    public function setTipoMovimentacao(?string $tipoMovimentacao): HistoricoMovimentacaoDTO
    {
        $this->tipoMovimentacao = $tipoMovimentacao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataMovimentacao(): mixed
    {
        return $this->dataMovimentacao;
    }

    /**
     * @param mixed $dataMovimentacao
     * @return HistoricoMovimentacaoDTO
     */
    public function setDataMovimentacao(mixed $dataMovimentacao): HistoricoMovimentacaoDTO
    {
        $this->dataMovimentacao = $dataMovimentacao;
        return $this;
    }

    /**
     * @param array $dados
     * @return HistoricoMovimentacaoDTO
     */
    public static function factory(array $dados)
    {
        $historico =  new HistoricoMovimentacaoDTO();
        $historico->setSku(Arr::get($dados, 'sku'));
        $historico->setQuantidade(Arr::get($dados, 'quantidade'));
        $historico->setTipoMovimentacao(Arr::get($dados, 'tipo_movimentacao'));
        $historico->setDataMovimentacao(Arr::get($dados, 'data_movimentacao'));

        return $historico;
    }

    public function jsonSerialize()
    {
        $data = [];

        $this->getSku() !== null && $data['sku'] = $this->getSku();
        $this->getQuantidade() !== null && $data['quantidade'] = $this->getQuantidade();
        $this->getTipoMovimentacao() !== null && $data['tipoMovimentacao'] = $this->getTipoMovimentacao();
        $this->getDataMovimentacao() !== null && $data['dataMovimentacao'] = $this->getDataMovimentacao();

        return $data;
    }
}
