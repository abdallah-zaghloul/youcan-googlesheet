<?php

namespace App\Providers;

use App\Repositories\SettingRepository;
use App\Repositories\SettingRepositoryEloquent;
use App\Repositories\SheetRepository;
use App\Repositories\SheetRepositoryEloquent;
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
        $this->app->bind(SheetRepository::class, SheetRepositoryEloquent::class);
        //:end-bindings:
    }
}
