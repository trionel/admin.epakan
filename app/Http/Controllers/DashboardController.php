<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Transaksi;
use App\Pesanan;
use App\DetailPesanan;
use App\Pengguna;
use App\Produk;

use App\User;

use Hash;
use Auth;
use DB;

use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        $tanggal_hari_ini = date('Y-m-d');
        $bulan_ini = date('m');
        $tahun_ini = date('Y');
        $pesanan;
        $pesanann;
        $saldo;
        $produk;
        $produkk;

        $transaksi = Transaksi::where('jenis','Pemasukan')->select(
            DB::raw('sum(nominal) as `data`'),
            DB::raw("CONCAT_WS('-', YEAR(tanggal), MONTH(tanggal)) as monthyear")
        )
        ->groupby('monthyear')
        ->get();

        $pemasukan = $transaksi->map(function($item) {
            return [
                "data" => $item->data,
                "monthyear" => $item->monthyear,
                "bulan" => date("M", strtotime($item->monthyear . "-1"))
            ];
        });

        $bulan = $transaksi->map(function($item) {
            return date("M", strtotime($item->monthyear . "-1"));
        });

        $transaksi = $transaksi->map(function($item) {
            return (double) $item->data;
        });

        

        $transaksii = Transaksi::where('jenis','Pengeluaran')->select(
            DB::raw('sum(nominal) as `data`'),
            DB::raw("CONCAT_WS('-', YEAR(tanggal), MONTH(tanggal)) as monthyear")
        )
        ->groupby('monthyear')
        ->get();

        $transaksii = $transaksii->map(function($item) {
            return (double) $item->data;
        });

        // $bulann = $transaksi->map(function($item) {
        //     return $item->bulann;
        // });

        // $categories = [];
        // $data = [];

        // foreach($transaksi as $t){
        //     $categories[] = $t->tanggal;
        //     $data[] = $transaksi;
        // }
        // dd($data);
        // dd(json_encode($categories));

        $pemasukan_hari_ini = Transaksi::where('jenis','Pemasukan')
                                ->whereDate('tanggal',$tanggal_hari_ini)
                                ->sum('nominal');

        $pemasukan_bulan_ini = Transaksi::where('jenis','Pemasukan')
                                ->whereMonth('tanggal',$bulan_ini)
                                ->sum('nominal');

        $pemasukan_tahun_ini = Transaksi::where('jenis','Pemasukan')
                                ->whereYear('tanggal',$tahun_ini)
                                ->sum('nominal');

        $seluruh_pemasukan = Transaksi::where('jenis','Pemasukan')->sum('nominal');

        $pengeluaran_hari_ini = Transaksi::where('jenis','Pengeluaran')
                                ->whereDate('tanggal',$tanggal_hari_ini)
                                ->sum('nominal');

        $pengeluaran_bulan_ini = Transaksi::where('jenis','Pengeluaran')
                                ->whereMonth('tanggal',$bulan_ini)
                                ->sum('nominal');

        $pengeluaran_tahun_ini = Transaksi::where('jenis','Pengeluaran')
                                ->whereYear('tanggal',$tahun_ini)
                                ->sum('nominal');

        $seluruh_pengeluaran = Transaksi::where('jenis','Pengeluaran')->sum('nominal');


        //Pie Chart Pengeluaran
        $kat[1]=DB::table('transaksi')->where('kategori_id','1')->count();
        $kat[2]=DB::table('transaksi')->where('kategori_id','2')->count();
        $kat[3]=DB::table('transaksi')->where('kategori_id','3')->count();
        $kat[4]=DB::table('transaksi')->where('kategori_id','4')->count();
        $kat[5]=DB::table('transaksi')->where('kategori_id','5')->count();
        $kat[6]=DB::table('transaksi')->where('kategori_id','8')->count();

        //Pie Chart Pengeluaran JSON
        

        //Pesanan
        $pesanann = Pesanan::all();
        $pesanan = Pesanan::orderBy('created_at','desc')->offset(0)->limit(7)->get();

        //Pengguna
        $pengguna = Pengguna::all();

        //Pengguna
        $penggunaa = Pengguna::all();
        $penggunaa = Pengguna::orderBy('id','desc')->offset(0)->limit(5)->get();

        //Pelanggan Setia
        $pengguna_setia = DB::select(
            "SELECT 
            p.nama, 
            (SELECT COUNT(d.id_pembeli) FROM detail_pesanan as d WHERE d.id_pembeli=p.id) as jumlah
        FROM pengguna as p WHERE 1 ORDER BY jumlah DESC LIMIT 5");

        $produkk = DB::select(
        "SELECT 
        p.id, 
        p.nama,
        p.harga,
        p.kategori,
        (SELECT COUNT(d.id_produk) FROM detail_pesanan as d WHERE d.id_produk=p.id) as jumlah
    FROM produk as p WHERE 1 ORDER BY jumlah DESC LIMIT 5");
        
        //Saldo
        $saldo = $seluruh_pemasukan - $seluruh_pengeluaran;

        //produk
        $produk = Produk::all();

        //Pie Chart Produk
        $prod[1]=DB::table('produk')->where('kategori','Pakan Sapi')->count();
        $prod[2]=DB::table('produk')->where('kategori','Pakan Kuda')->count();
        $prod[3]=DB::table('produk')->where('kategori','Pakan Domba & Kambing')->count();
        $prod[4]=DB::table('produk')->where('kategori','Pakan Ayam')->count();
        $prod[5]=DB::table('produk')->where('kategori','Pakan Kerbau')->count();
        $prod[6]=DB::table('produk')->where('kategori','Suplemen')->count();
        $prod[7]=DB::table('produk')->where('kategori','Hijauan')->count();
        $prod[8]=DB::table('produk')->where('kategori','Bahan Mentah Pakan')->count();
        $prod[9]=DB::table('produk')->where('kategori','Produk Peternak Binaan')->count();

        return view('dashboard',
            [
                'pemasukan_hari_ini' => $pemasukan_hari_ini, 
                'pemasukan_bulan_ini' => $pemasukan_bulan_ini,
                'pemasukan_tahun_ini' => $pemasukan_tahun_ini,
                'seluruh_pemasukan' => $seluruh_pemasukan,
                'pengeluaran_hari_ini' => $pengeluaran_hari_ini, 
                'pengeluaran_bulan_ini' => $pengeluaran_bulan_ini,
                'pengeluaran_tahun_ini' => $pengeluaran_tahun_ini,
                'seluruh_pengeluaran' => $seluruh_pengeluaran,
                'kat'=>$kat,
                'pesanan'=>$pesanan,
                'pengguna'=>$pengguna,
                'penggunaa'=>$penggunaa,
                'pesanann'=>$pesanann,
                'saldo'=>$saldo,
                'produk'=>$produk,
                'produkk'=>$produkk,
                'prod' => $prod,
                "pemasukan" => $transaksi,
                "pengeluaran" => $transaksii,
                'bulan' => $bulan,
                "pengguna_setia" => $pengguna_setia,
            ]
        );
    }

    // public function grafik()
    // {
    //     $transaksi = Transaksi::all();

    //     $categories = [];

    //     foreach($transaksi as $t){
    //         $categories[] = $t->tanggal;
    //     }
    //     // dd($categories);

    //     return view('dashboard',['transaksi'=>$transaksi]);
    // }
}
