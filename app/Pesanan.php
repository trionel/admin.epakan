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
        // 1 kategori bisa memiliki banyak transaksi
        return $this->hasOne('App\DetailPesanan');
    }
}
