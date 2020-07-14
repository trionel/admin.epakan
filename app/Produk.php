<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "produk";
    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public function pengguna()
    {
        // tabel transaksi adalah milik tabel kategori
        return $this->belongsTo('App\Pengguna','id_pengguna');
    }

    public function pesanan_detail()
    {
        return $this->hasMany('App\DetailPesanan','id_produk');
    }

    public function detail_pesanan()
    {
        return $this->hasMany(DetailPesanan::class);
    }

    // public function produk()
    // {
    //     return $this->belongsTo('App\Produk');
    // }

    // public function pesanan_detail()
    // {
    //     return $this->belongsTo('App\DetailPesanan','id_produk');
    // }
}
