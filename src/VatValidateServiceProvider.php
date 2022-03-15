<?php

namespace Itemvirtual\VatValidate;

use Illuminate\Support\ServiceProvider;

class VatValidateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('vat-validate.php'),
            ], 'config');

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
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'vat-validate');

        // Add log channel to project
        $this->mergeConfigFrom(__DIR__ . '/../config/log-channel.php', 'logging.channels');

        // Register the main class to use with the facade
        $this->app->singleton('vat-validate', function () {
            return new VatValidate;
        });
    }
}
