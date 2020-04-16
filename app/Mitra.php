<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $table = "request_mitra";

    public function saldo()
    {
        // 1 pengguna bisa memiliki banyak pencairan saldo
        return $this->hasMany('App\Saldo');
    }
}
