<?php

namespace App\Providers;

use App\Services\GoogleService;
use App\Services\PriceCalculationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GoogleService::class, function ($app) {
            return new GoogleService();
        });

        $this->app->singleton(PriceCalculationService::class, function ($app) {
            return new PriceCalculationService();
        });
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
