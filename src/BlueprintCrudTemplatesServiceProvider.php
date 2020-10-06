<?php

namespace Npakatar\BlueprintCrudTemplates;

use Blueprint\Blueprint;
use Illuminate\Support\ServiceProvider;
use Npakatar\BlueprintCrudTemplates\Lexers\TemplateLexer;

class BlueprintCrudTemplatesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'blueprint-crud-templates');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'blueprint-crud-templates');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('blueprint-crud-templates.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/blueprint-crud-templates'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/blueprint-crud-templates'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/blueprint-crud-templates'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'blueprint-crud-templates');

        $this->app->extend(Blueprint::class, function (Blueprint $blueprint, $app) {
            $blueprint->registerLexer(app(TemplateLexer::class));

            return $blueprint;
        });
    }
}
