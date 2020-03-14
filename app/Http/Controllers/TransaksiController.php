<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Transaksi;
use App\Pesanan;

class TransaksiController extends Controller
{
    public function index()
    {
        //// mengurutkan data transaksi berdasarkan id terbesar (transaksi terbaru) 
        $transaksi = Transaksi::orderBy('id','desc')->paginate(10);

        return view('transaksi.transaksi',['transaksi' => $transaksi]);
    }

    public function tambah()
    {
        $kategori = Kategori::all();

        return view('transaksi.transaksi_tambah',['kategori'=>$kategori]);
    }

    public function aksi(Request $data)
    {
        $data->validate([ 
            'tanggal' => 'required', 
            'jenis' => 'required', 
            'kategori' => 'required', 
            'nominal' => 'required' 
        ]); 

        $trans = Transaksi::orderBy('id','desc')->first();
        if($data->kategori != 1){
            $saldo = $trans->saldo - $data->nominal;
        }
        else{
            $saldo = $trans->saldo + $data->nominal;
        }

        // insert data ke table transaksi 
    Transaksi::insert([ 
        'tanggal' => $data->tanggal, 
        'jenis' => $data->jenis, 
        'kategori_id' => $data->kategori, 
        'nominal' => $data->nominal, 
        'keterangan' => $data->keterangan, 
        'saldo' => $saldo
        ]);

        

        return redirect('transaksi')->with("sukses","Transaksi berhasil tersimpan"); 
    }

    public function edit($id)
    {
        $kategori = Kategori::all();

         // mengambil data transaksi berdasarkan id 
        $transaksi = Transaksi::find($id); 
        return view('transaksi.transaksi_edit',['kategori' => $kategori, 'transaksi' => $transaksi]); 
    }

    public function update($id, Request $data)
    {
        $data->validate([
        'tanggal' => 'required', 
        'jenis' => 'required', 
        'kategori' => 'required', 
        'nominal' => 'required' 
    ]);
     // ambil transaksi berdasarkan id 
        $transaksi = Transaksi::find($id); 
 
     // ubah data tanggal, jenis, kategori, nominal, keterangan 
        $transaksi->tanggal = $data->tanggal; 
        $transaksi->jenis = $data->jenis; 
        $transaksi->kategori_id = $data->kategori; 
        $transaksi->nominal = $data->nominal; 
        $transaksi->keterangan = $data->keterangan; 
  
     // Simpan perubahan 
        $transaksi->save();

        return redirect('transaksi')->with("edit","Transaksi berhasil diubah"); 
    }

    public function hapus($id)
    {
        $transaksi = Transaksi::find($id);         
        $transaksi->delete(); 

        return redirect('transaksi')->with("hapus","Transaksi berhasil dihapus");
    }

    public function cari(Request $data) 
    { 
        // keyword pencarian 
        $cari = $data->cari; 
         // mengambil data transaksi 
        $transaksi = Transaksi::orderBy('id','desc') 
        ->where('jenis','like',"%".$cari."%") 
        ->orWhere('tanggal','like',"%".$cari."%") 
        ->orWhere('keterangan','like',"%".$cari."%") 
        ->orWhere('nominal','=',"%".$cari."%") 
        ->paginate(6); 

        // menambahkan keyword pencarian ke data transaksi 
        $transaksi->appends($data->only('cari')); 

        // passing data transaksi ke view transaksi.blade.php 
        return view('transaksi.transaksi',['transaksi' => $transaksi]); 
    }

    public function pesanan()
    {
        $pesanan = Pesanan::orderBy('id_pesanan','desc')->paginate(5);
        // $pesanan = Pesanan::all(); 
        return view('transaksi.pesanan',['pesanan' => $pesanan]); 
    }

    public function pesanan_edit($id_pesanan)
    {
         // mengambil data transaksi berdasarkan id 
        $pesanan = Pesanan::find($id_pesanan); 
        
        return view('transaksi.pesanan_edit',['pesanan' => $pesanan]); 
    }

    public function pesanan_update($id_pesanan, Request $data)
    {
        $data->validate([
            'status' => 'required'
        ]);
        
        $pesanan = Pesanan::where('id_pesanan',$id_pesanan)->first();

        
        $pesanan->status = $data->status;

        $pesanan->save();


        $trans = Transaksi::orderBy('id','desc')->first();
            
        $saldo = $trans->saldo + $pesanan->total_bayar;

        Transaksi::insert([ 
            'tanggal' => date('Y-m-d H:i:s'),
            'jenis' => 'pemasukan', 
            'kategori_id' => '1', 
            'nominal' => $pesanan->total_bayar, 
            'keterangan' => 'Pesanan', 
            'saldo' => $saldo
            ]);

        return redirect('pesanan');
    }

    public function detail_pesanan($id_pesanan)
    {
        return view('transaksi.detail_pesanan',['pesanan' => $pesanan]); 
    }

    public function cari_pesanan(Request $data) 
    { 
        // keyword pencarian 
        $cari = $data->cari; 
         // mengambil data transaksi 
        $pesanan = Pesanan::orderBy('id_pesanan','desc') 
        ->where('status','like',"%".$cari."%")  
        ->paginate(5); 

        // menambahkan keyword pencarian ke data transaksi 
        $pesanan->appends($data->only('cari')); 

        // passing data transaksi ke view transaksi.blade.php 
        return view('transaksi.pesanan',['pesanan' => $pesanan]); 
    }
}
