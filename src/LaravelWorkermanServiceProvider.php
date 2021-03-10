<?php

namespace Zorca\LaravelWorkerman;

use Illuminate\Support\ServiceProvider;

class LaravelWorkermanServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'zorca');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'zorca');
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
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-workerman.php', 'laravel-workerman');

        // Register the service the package provides.
        $this->app->singleton('laravel-workerman', function ($app) {
            return new LaravelWorkerman;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-workerman'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/laravel-workerman.php' => config_path('laravel-workerman.php'),
        ], 'laravel-workerman.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/zorca'),
        ], 'laravel-workerman.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/zorca'),
        ], 'laravel-workerman.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/zorca'),
        ], 'laravel-workerman.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
