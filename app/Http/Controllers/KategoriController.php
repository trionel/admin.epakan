<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Transaksi;
use Session;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all(); 
        return view('kategori.kategori',['kategori' => $kategori]); 
    }

    public function tambah()
    {
        return view('kategori.kategori_tambah');
    }

    public function aksi(Request $data)
    {
        $data->validate([
            'kategori' => 'required'
        ]);

        $kategori = $data->kategori;

        Kategori::insert([
            'kategori' => $kategori
        ]);

        Session::flash("sukses","Kategori berhasil tersimpan");

        return redirect ('kategori');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);   
        return view('kategori.kategori_edit',['kategori' => $kategori]);
    }

    public function update($id, Request $data)
    {
        $data->validate([
            'kategori'=>'required'
        ]);

        $nama_kategori = $data->kategori;
        // update kategori 
        $kategori = Kategori::find($id); 
        $kategori->kategori = $nama_kategori; 
        $kategori->save();

        return redirect('kategori')->with("edit","Kategori berhasil diubah"); 
    }

    public function hapus($id)
    {
        $kategori = Kategori::find($id);        
        $kategori->delete(); 

        // menghapus transaksi berdasarkan id kategori yang dihapus
        $transaksi = Transaksi::where('kategori_id',$id);        
        $transaksi->delete(); 

        return redirect('kategori')->with("hapus","Kategori berhasil dihapus"); 
    }
}
