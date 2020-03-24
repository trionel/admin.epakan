<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produk;

class ProdukController extends Controller
{
    public function produk()
    {
        $produk = Produk::orderBy('id','desc')->paginate(10); 
        return view('produk.produk',['produk' => $produk]);
    }

    public function edit_produk($id)
    {
         // mengambil data pesanan berdasarkan id pesanan 
        $produk = Produk::find($id); 
        
        return view('produk.produk_edit',['produk' => $produk]); 
    }

    public function update_produk($id, Request $data)
    {
        $data->validate([
            'id_pengguna' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'satuan' => 'required',
            'status' => 'required',
            'kategori' => 'required',
            'minimum' => 'required',
            'stok' => 'required',
        ]);
        
        $produk = Produk::where('id',$id)->first();

        $produk->id_pengguna = $data->id_pengguna;
        $produk->nama = $data->nama;
        $produk->harga = $data->harga;
        $produk->satuan = $data->satuan;
        $produk->status = $data->status;
        $produk->kategori = $data->kategori;
        $produk->minimum = $data->minimum;
        $produk->stok = $data->stok;

        $produk->save();

        return redirect('produk')->with("edit","Produk dengan nama {$produk->nama} berhasil diubah");
    }

    public function cari_produk(Request $data) 
    { 
        // keyword pencarian 
        $cari = $data->cari; 
         // mengambil data transaksi 
        $produk = Produk::orderBy('id','desc') 
        ->where('id_pengguna','like',"%".$cari."%")
        ->orWhere('nama','like',"%".$cari."%")
        ->orWhere('harga','like',"%".$cari."%")
        ->orWhere('status','like',"%".$cari."%")
        ->orWhere('stok','like',"%".$cari."%")          
        ->orWhere('kategori','like',"%".$cari."%")  
        ->paginate(5); 

        // menambahkan keyword pencarian ke data transaksi 
        $produk->appends($data->only('cari')); 

        // passing data transaksi ke view transaksi.blade.php 
        return view('produk.produk',['produk' => $produk]); 
    }

    public function hapus_produk($id)
    {
        $produk = Produk::find($id);         
        $produk->delete(); 

        return redirect('produk')->with("hapus","Produk berhasil dihapus");
    }
}
