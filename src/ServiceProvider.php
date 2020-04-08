<?php

namespace Hogus\LaravelMtaAnalytics;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MtaAnalyticsManager::class,function ($app){
            return new MtaAnalyticsManager($app->config->get('mta'));
        });

        $this->app->alias(MtaAnalyticsManager::class, 'mta');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__.'/config.php';

        $this->publishes([$configPath => config_path('mta.php')], 'config');
    }

    public function provides()
    {
        return [MtaAnalyticsManager::class];
    }
}
