<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = "pengguna";
    protected $primaryKey = 'id';

    public function saldo()
    {
        // 1 pengguna bisa memiliki banyak pencairan saldo
        return $this->hasMany('App\Saldo');
    }

    public function pesanan()
    {
        // 1 pengguna bisa memiliki banyak pencairan saldo
        return $this->hasMany('App\Pesanan');
    }

    public function produk()
    {
        // 1 pengguna bisa memiliki banyak pencairan saldo
        return $this->hasMany('App\Produk');
    }

    public function pesanan_detail()
    {
        return $this->hasMany('App\DetailPesanan','id_pembeli');
    }

    // public function email()
    // {
    //     // 1 pengguna bisa memiliki banyak pencairan saldo
    //     return $this->hasMany('App\Email');
    // }
}
