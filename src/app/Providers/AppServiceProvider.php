<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\RakutenService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(RakutenService::class, function ($app) {
            return new RakutenService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
