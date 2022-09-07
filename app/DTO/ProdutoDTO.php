<?php

namespace App\DTO;

use Illuminate\Support\Arr;
use JsonSerializable;

class ProdutoDTO implements JsonSerializable
{
    /**
     * @var string|null
     */
    private string|null $nome;

    /**
     * @var string|null
     */
    private string|null $sku;

    /**
     * @var mixed
     */
    private mixed $quantidadeInicial;

    /**
     * @return string|null
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * @param string|null $nome
     * @return ProdutoDTO
     */
    public function setNome(?string $nome): ProdutoDTO
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string|null $sku
     * @return ProdutoDTO
     */
    public function setSku(?string $sku): ProdutoDTO
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantidadeInicial(): mixed
    {
        return $this->quantidadeInicial;
    }

    /**
     * @param mixed $quantidadeInicial
     * @return ProdutoDTO
     */
    public function setQuantidadeInicial(mixed $quantidadeInicial): ProdutoDTO
    {
        $this->quantidadeInicial = $quantidadeInicial;
        return $this;
    }

    /**
     * @param array $dados
     * @return ProdutoDTO
     */
    public static function factory(array $dados)
    {
        $produtoDTO = new ProdutoDTO();
        $produtoDTO->setNome(Arr::get($dados, 'nome'));
        $produtoDTO->setSku(Arr::get($dados, 'sku'));
        $produtoDTO->setQuantidadeInicial(Arr::get($dados, 'quantidadeInicial'));

        return $produtoDTO;
    }

    public function jsonSerialize()
    {
        $data = [];

        $this->getNome() !== null && $data['nome'] = $this->getNome();
        $this->getSku() !== null && $data['sku'] = $this->getSku();
        $this->getQuantidadeInicial() !== null && $data['quantidadeInicial'] = $this->getQuantidadeInicial();

        return $data;
    }
}
