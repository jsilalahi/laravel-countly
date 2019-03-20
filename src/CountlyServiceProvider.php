<?php

namespace DynEd\Countly;

use Illuminate\Support\ServiceProvider;

class CountlyServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $config = realpath(__DIR__ . '/../../config/countly.php');

        $this->mergeConfigFrom($config, 'countly');

        $this->publishes([
            $config => config_path('countly.php'),
        ]);
    }
}