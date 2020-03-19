<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pengguna;
use App\Mitra;

class PenggunaController extends Controller
{
    public function mitra()
    {
        $mitra = Mitra::orderBy('id','desc')->paginate(5);
        // $mitra = Mitra::all();
    	return view('pengguna.mitra', ['mitra' => $mitra]);
    }

    public function detail_mitra($id)
    {
        $mitra = Mitra::where('id',$id)->get();
        return view('pengguna.detail_mitra',['mitra' => $mitra,]); 
    }

    public function hapus_mitra($id)
    {
        $mitra = Mitra::find($id);        
        $mitra->delete(); 

        return redirect('mitra')->with("hapus","Mitra {$mitra->nama} berhasil dihapus"); 
    }

    public function cari_mitra(Request $data) 
    { 
        // keyword pencarian 
        $cari = $data->cari; 
         // mengambil data transaksi 
        $mitra = Mitra::orderBy('id','desc') 
        ->where('id_pengguna','like',"%".$cari."%") 
        ->orWhere('nama','like',"%".$cari."%") 
        ->orWhere('nik','like',"%".$cari."%") 
        ->orWhere('tipe','=',"%".$cari."%") 
        ->paginate(5); 

        // menambahkan keyword pencarian ke data transaksi 
        $mitra->appends($data->only('cari')); 

        // passing data transaksi ke view transaksi.blade.php 
        return view('pengguna.mitra',['mitra' => $mitra]); 
    }

    public function pelanggan()
    {
        $pengguna = Pengguna::orderBy('id','desc')->paginate(10);
        // $pengguna = Pengguna::all();
    	return view('pengguna.pelanggan', ['pengguna' => $pengguna]);
    }

    public function verifikasi($id)
    {
         // mengambil data transaksi berdasarkan id 
        $pengguna = Pengguna::find($id); 
        
        return view('pengguna.verifikasi',['pengguna' => $pengguna]); 
    }

    public function verifikasi_update($id, Request $data)
    {
        $data->validate([
        'status' => 'required', 
        ]);

        $pengguna = Pengguna::find($id); 
 
        $pengguna->status = $data->status; 
        
        $pengguna->save();

        return redirect('pelanggan')->with("edit","akun dengan nama {$pengguna->nama} sudah menjadi mitra");
    }

    public function cari_pelanggan(Request $data) 
    { 
        // keyword pencarian 
        $cari = $data->cari; 
         // mengambil data transaksi 
        $pengguna = Pengguna::orderBy('id','desc') 
        ->where('nama','like',"%".$cari."%") 
        ->orWhere('no_telp','like',"%".$cari."%") 
        ->orWhere('daerah','like',"%".$cari."%") 
        ->paginate(5); 

        // menambahkan keyword pencarian ke data transaksi 
        $pengguna->appends($data->only('cari')); 

        // passing data transaksi ke view transaksi.blade.php 
        return view('pengguna.pelanggan',['pengguna' => $pengguna]); 
    }

    public function maps()
    {
        return view('pengguna.maps');
    }
}
