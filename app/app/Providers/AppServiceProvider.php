<?php

namespace App\Providers;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facture;
use App\Observers\FactureObserver;

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
        Facture::observe(FactureObserver::class);

        Model::unguard();
    }
}
