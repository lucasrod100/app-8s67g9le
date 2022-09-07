<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacao_estoque', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantidade');
            $table->timestamp('data_movimentacao');
            $table->integer('id_estoque')->unsigned();
            $table->integer('id_tipo_movimentacao')->unsigned();

            $table->foreign('id_estoque')->references('id')->on('estoque');
            $table->foreign('id_tipo_movimentacao')->references('id')->on('tipo_movimentacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacao_estoque');
    }
};
