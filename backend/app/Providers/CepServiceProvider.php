<?php

namespace App\Providers;

use App\Interfaces\CepRepositoryInterface;
use App\Repositories\ViaCepRepository;
use Illuminate\Support\ServiceProvider;

class CepServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CepRepositoryInterface::class, ViaCepRepository::class);
    }
}
