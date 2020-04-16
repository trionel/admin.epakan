<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $table = "saldo_masuk";

    public function pengguna()
    {
        // tabel transaksi adalah milik tabel kategori
        return $this->belongsTo('App\Pengguna','id_pengguna');
    }
}
