<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TipoMovimentacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_movimentacao')->insert([
            'id' => 1,
            'nome' => 'adicionar'
        ]);

        DB::table('tipo_movimentacao')->insert([
            'id' => 2,
            'nome' => 'remover'
        ]);
    }
}
