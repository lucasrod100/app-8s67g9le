<?php

namespace App\Providers;

use App\Repository\Contracts\MovimentacaoEstoqueRepositoryInterface;
use App\Service\Contracts\MovimentacaoEstoqueServiceInterface;
use App\Repository\Contracts\EstoqueRepositoryInterface;
use App\Repository\Contracts\ProdutoRepositoryInterface;
use App\Service\Contracts\EstoqueServiceInterface;
use App\Service\Contracts\ProdutoServiceInterface;
use App\Repository\MovimentacaoEstoqueRepository;
use App\Service\MovimentacaoEstoqueService;
use Illuminate\Support\ServiceProvider;
use App\Repository\ProdutoRepository;
use App\Repository\EstoqueRepository;
use App\Service\EstoqueService;
use App\Service\ProdutoService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProdutoServiceInterface::class, ProdutoService::class);

        $this->app->bind(ProdutoRepositoryInterface::class, ProdutoRepository::class);

        $this->app->bind(EstoqueServiceInterface::class, EstoqueService::class);

        $this->app->bind(EstoqueRepositoryInterface::class, EstoqueRepository::class);

        $this->app->bind(MovimentacaoEstoqueServiceInterface::class, MovimentacaoEstoqueService::class);

        $this->app->bind(MovimentacaoEstoqueRepositoryInterface::class, MovimentacaoEstoqueRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
