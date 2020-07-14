<?php

namespace App\Providers;

// use App\Observers\KategoriObserver;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Pesanan;
use App\DetailPesanan;

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
        $belum = Pesanan::where('status','belum')->get();
        $dikirim = DetailPesanan::where('status','dikirim')->get();
        $diterima = DetailPesanan::where('status','diterima')->get();
        $data[0]=$belum;
        $data[1]=$dikirim;
        $data[2]=$diterima;
        View::share('datas',$data);
        // Kategori::observe(KategoriObserver::class);
    }
}
