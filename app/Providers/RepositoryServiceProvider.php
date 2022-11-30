<?php

namespace App\Providers;

use App\Repositories\Usuario\UsuarioRepositoryContract;
use App\Repositories\Usuario\UsuarioRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UsuarioRepositoryContract::class, UsuarioRepository::class);
    }
}
