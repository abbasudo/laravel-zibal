<?php

namespace Llabbasmkhll\LaravelZibal;

use Illuminate\Support\ServiceProvider;

class LaravelZibalServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'zibal',
            function ($app) {
                return new Zibal();
            }
        );

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'zibal');
    }

    /**
     * Publish the plugin configuration.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__.'/../config/config.php' => config_path('zibal.php'),
                ],
                'config'
            );
        }
    }
}
