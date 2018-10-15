<?php

namespace Jacek80\Bmclient;

use Illuminate\Support\ServiceProvider;

class bmclientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes/web.php';
        $this->loadViewsFrom(__DIR__.'/views', 'bmclient');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('jacek80\bmclient\ProductsController');
        $this->mergeConfigFrom( __DIR__.'/config.php', 'bmclientconfig');
    }
}