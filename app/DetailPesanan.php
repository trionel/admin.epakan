<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    protected $table = "detail_pesanan";
    protected $primaryKey = 'id_detail';

    public function pesanan()
    {
        // 1 kategori bisa memiliki banyak transaksi
        return $this->belongsTo('App\Pesanan');
    }

    public function produk()
    {
        return $this->belongsTo('App\Produk');
    }

    public function pengguna()
    {
        return $this->belongsTo('App\Pengguna');
    }

    // public function produkk()
    // {
    //     return $this->hasMany('App\Produk');
    // }
}
