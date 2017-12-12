<?php

namespace Selfreliance\Deposits;

use Illuminate\Support\ServiceProvider;

class DepositsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes.php';
        $this->app->make('Selfreliance\Deposits\DepositsController');
        $this->loadViewsFrom(__DIR__.'/views', 'deposits');
        $this->publishes([
            __DIR__ . '/config/deposits.php' => config_path('deposits.php')
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}