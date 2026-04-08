<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Blaze\Blaze;


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
        //
        Blaze::optimize()
        ->in(resource_path('views/components/ui'))
        ->in(resource_path('views/components/examples'))
        ->in(resource_path('views/components/site'))
        ->in(resource_path('views/components/md'))
        ->in(resource_path('views/components/docs'))
        ->in(resource_path('views/components/atoms'))
        ->in(resource_path('views/components/molecules'))
        ->in(resource_path('views/components/organisms'));
    }
}
