<?php

namespace SAPLibrary\Providers;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;

class SAPLibraryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $source = realpath($raw = _DIR_.'/../config/sap.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('sap.php')]);
        }

        if ($this->app instanceof LaravelApplication && ! $this->app->configurationIsCached()) {
            $this->mergeConfigFrom($source, 'sap');
        }
    }

    public function register()
    {
    }
}
