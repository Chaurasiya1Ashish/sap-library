<?php

namespace SAPLibrary;

use Illuminate\Support\ServiceProvider;

class SAPLibraryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish the configuration file
        $this->publishes([
            __DIR__ . '/../config/sap.php' => config_path('sap.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sap.php', 'sap');

        $this->app->bind(SAPSessionManager::class, function ($app) {
            return new SAPSessionManager(
                config('sap.domain'),
                config('sap.sap_request_content')
            );
        });

        $this->app->bind(SAPInvoiceCreator::class, function ($app) {
            return new SAPInvoiceCreator(
                $app->make(SAPSessionManager::class)
            );
        });
    }
}
