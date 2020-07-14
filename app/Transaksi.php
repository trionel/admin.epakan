<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksi";
    protected $fillable = ["tanggal","jenis","kategori_id","nominal","keterangan"];
    protected $appends = ["bulan"];

    public function kategori()
    {
        // tabel transaksi adalah milik tabel kategori
        return $this->belongsTo('App\Kategori');
    }

    public function getBulanAttribute()
    {
        return date("M", strtotime($this->tanggal));
    }
}
