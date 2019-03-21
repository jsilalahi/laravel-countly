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
        $configPath = realpath(__DIR__ . '/../config/countly.php');

        $this->mergeConfigFrom($configPath, 'countly');

        $this->publishes([$configPath => $this->getConfigPath()], 'countly');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Countly::class, function () {
            return new Countly(
                $this->app['config']->get('countly')
            );
        });
    }

    /**
     * Get the config path
     *
     * @return string
     */
    protected function getConfigPath()
    {
        return config_path('countly.php');
    }
}