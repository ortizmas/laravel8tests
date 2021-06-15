<?php

namespace App\Providers;

use Illuminate\Contracts\Routing\UrlGenerator;
use Laravel\Jetstream\Jetstream;
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
        //check that app is local
        // if (!$this->app->isLocal()) {
        //     $this->app['request']->server->set('HTTPS', true);
        // }
        // Evitar accesso as rotas do pacote
        Jetstream::ignoreRoutes();
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
