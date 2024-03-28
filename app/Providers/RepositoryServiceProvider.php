<?php

namespace App\Providers;

use App\Repositories\SettingRepository;
use App\Repositories\SettingRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(SettingRepository::class, SettingRepositoryEloquent::class);
        //:end-bindings:
    }
}
