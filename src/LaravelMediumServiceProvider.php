<?php

namespace PaulAyuk\LaravelMedium;

use Illuminate\Support\ServiceProvider;

class LaravelMediumServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'paulayuk');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'paulayuk');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravelmedium.php', 'laravelmedium');

        // Register the service the package provides.
        $this->app->singleton('laravelmedium', function ($app) {
            return new LaravelMedium;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravelmedium'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravelmedium.php' => config_path('laravelmedium.php'),
        ], 'laravelmedium.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/paulayuk'),
        ], 'laravelmedium.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/paulayuk'),
        ], 'laravelmedium.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/paulayuk'),
        ], 'laravelmedium.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
