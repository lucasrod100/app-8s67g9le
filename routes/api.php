<?php

use App\Http\Controllers\MovimentacaoEstoqueController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/produto', [ProdutoController::class, 'inserirProduto']);
Route::post('/produto/movimentar', [EstoqueController::class, 'movimentarProdutoEstoque']);
Route::get(
    '/produto/historicoMovimentacao', [MovimentacaoEstoqueController::class, 'retornarHistoricoMovimentacao']
);
