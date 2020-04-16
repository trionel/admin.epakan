<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pencairan extends Model
{
    protected $table = "saldo_cair";
    // protected $primaryKey = 'id';

    public function pengguna()
    {
        // tabel transaksi adalah milik tabel kategori
        return $this->belongsTo('App\Pengguna','id_pengguna');
    }
}
