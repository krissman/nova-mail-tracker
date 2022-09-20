<?php

namespace Intelliants\NovaMailTracker;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class ToolServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'nova-mail-tracker-tool');

        $this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/nova-mail-tracker-tool'),
        ], 'nova-mail-tracker-tool');

        $this->app->booted(function () {
            $this->routes();
        });
    }

    protected function routes(): void
    {
        if ($this->app->routesAreCached()) {
            return;
        }
    }
}
