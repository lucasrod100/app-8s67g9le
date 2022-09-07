<?php

namespace App\Providers;

use App\Repository\Contracts\ProdutoRepositoryInterface;
use App\Service\Contracts\ProdutoServiceInterface;
use Illuminate\Support\ServiceProvider;
use App\Repository\ProdutoRepository;
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
