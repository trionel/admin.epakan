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

    // public function email()
    // {
    //     // 1 pengguna bisa memiliki banyak pencairan saldo
    //     return $this->hasMany('App\Email');
    // }
}
