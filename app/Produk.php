<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "produk";
    protected $primaryKey = 'id';

    public function pengguna()
    {
        // tabel transaksi adalah milik tabel kategori
        return $this->belongsTo('App\Pengguna','id_pengguna');
    }
}
