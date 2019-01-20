<?php

namespace PaulAyuk\laravel-medium;

use Illuminate\Support\ServiceProvider;

class laravel-mediumServiceProvider extends ServiceProvider
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
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-medium.php', 'laravel-medium');

        // Register the service the package provides.
        $this->app->singleton('laravel-medium', function ($app) {
            return new laravel-medium;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-medium'];
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
            __DIR__.'/../config/laravel-medium.php' => config_path('laravel-medium.php'),
        ], 'laravel-medium.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/paulayuk'),
        ], 'laravel-medium.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/paulayuk'),
        ], 'laravel-medium.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/paulayuk'),
        ], 'laravel-medium.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
