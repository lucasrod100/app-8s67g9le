<?php

namespace App\Repository;

use App\Repository\Contracts\MovimentacaoEstoqueRepositoryInterface;
use App\DTO\HistoricoMovimentacaoDTO;
use App\DTO\MovimentacaoEstoqueDTO;
use App\Models\MovimentacaoEstoque;
use Illuminate\Support\Facades\DB;

class MovimentacaoEstoqueRepository implements MovimentacaoEstoqueRepositoryInterface
{
    /**
     * @param int $idEstoque
     * @param MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO
     * @return mixed
     */
    public function salvarHistorico(int $idEstoque, MovimentacaoEstoqueDTO $movimentacaoEstoqueDTO)
    {
        return MovimentacaoEstoque::create([
            "quantidade" => $movimentacaoEstoqueDTO->getQuantidade(),
            "id_estoque" => $idEstoque,
            "id_tipo_movimentacao" => $movimentacaoEstoqueDTO->getTipoMovimentacao()
        ]);
    }

    /**
     * @return array
     */
    public function retornarHistorico()
    {
        return DB::query()->from("movimentacao_estoque", "me")
            ->select(
                "me.quantidade as quantidade",
                "me.data_movimentacao as data_movimentacao",
                "p.sku as sku",
                "tp.nome as tipo_movimentacao"
            )
            ->join("estoque as e", "me.id_estoque", "=", "e.id")
            ->join("produto as p", "e.id_produto", "=", "p.id")
            ->join("tipo_movimentacao as tp", "me.id_tipo_movimentacao", "=", "tp.id")
            ->get()->map(fn($item) => HistoricoMovimentacaoDTO::factory((array) $item))
            ->toArray();
    }
}
