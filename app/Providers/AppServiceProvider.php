<?php

namespace App\Providers;

use App\Support\WordGenerators\RyanrkWordGenerator;
use App\Support\WordGenerators\WordGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(WordGenerator::class, function ($app) {
            $locale = $app->getLocale();
            return new RyanrkWordGenerator($locale);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
