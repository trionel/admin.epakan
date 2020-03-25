<?php

namespace App\Providers;

use App\Observers\KategoriObserver;

use Illuminate\Support\ServiceProvider;

use App\Kategori;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Kategori::observe(KategoriObserver::class);
    }
}
