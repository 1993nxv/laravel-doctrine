<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EmpresaRepository;
use App\Repositories\EmpresaRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmpresaRepositoryInterface::class, EmpresaRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
