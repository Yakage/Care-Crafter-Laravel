<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Check if the application is running in a production environment
        if ($this->app->environment('production')) {
            // Force the application to use 'https' scheme for all generated URLs
            URL::forceScheme('https');
        }
    }
}
