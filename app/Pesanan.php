<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = "pesanan";
    protected $primaryKey = 'id_pesanan';

    protected $keyType = 'string';

    public function pesanan_detail()
    {
        // 1 pesanan memiliki 1 detail pesanan
        return $this->hasOne('App\DetailPesanan');
    }
}
