<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Transaksi;
use App\Pesanan;
use App\Pengguna;

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


        //Chart Pemasukan
        $tm1 = Transaksi::where('jenis','Pemasukan')
                                ->where('tanggal','like','2020-01%')
                                ->sum('nominal');

        $tm2 = Transaksi::where('jenis','Pemasukan')
                                ->where('tanggal','like','2020-02%')
                                ->sum('nominal');

        $tm3 = Transaksi::where('jenis','Pemasukan')
                                ->where('tanggal','like','2020-03%')
                                ->sum('nominal');

        $tm4 = Transaksi::where('jenis','Pemasukan')
                                ->where('tanggal','like','2020-04%')
                                ->sum('nominal');

        $tm5 = Transaksi::where('jenis','Pemasukan')
                                ->where('tanggal','like','2020-05%')
                                ->sum('nominal');

        $tm6 = Transaksi::where('jenis','Pemasukan')
                                ->where('tanggal','like','2020-06%')
                                ->sum('nominal');

        $tm7 = Transaksi::where('jenis','Pemasukan')
                                ->where('tanggal','like','2020-07%')
                                ->sum('nominal');

        $tm8 = Transaksi::where('jenis','Pemasukan')
                                ->where('tanggal','like','2020-08%')
                                ->sum('nominal');

        $tm9 = Transaksi::where('jenis','Pemasukan')
                                ->where('tanggal','like','2020-09%')
                                ->sum('nominal');

        $tm10 = Transaksi::where('jenis','Pemasukan')
                                ->where('tanggal','like','2020-10%')
                                ->sum('nominal');

        $tm11 = Transaksi::where('jenis','Pemasukan')
                                ->where('tanggal','like','2020-11%')
                                ->sum('nominal');

        $tm12 = Transaksi::where('jenis','Pemasukan')
                                ->where('tanggal','like','2020-12%')
                                ->sum('nominal');


        //Chart Pengeluaran
        $tk1 = Transaksi::where('jenis','Pengeluaran')
                                ->where('tanggal','like','2020-01%')
                                ->sum('nominal');

        $tk2 = Transaksi::where('jenis','Pengeluaran')
                                ->where('tanggal','like','2020-02%')
                                ->sum('nominal');

        $tk3 = Transaksi::where('jenis','Pengeluaran')
                                ->where('tanggal','like','2020-03%')
                                ->sum('nominal');

        $tk4 = Transaksi::where('jenis','Pengeluaran')
                                ->where('tanggal','like','2020-04%')
                                ->sum('nominal');

        $tk5 = Transaksi::where('jenis','Pengeluaran')
                                ->where('tanggal','like','2020-05%')
                                ->sum('nominal');

        $tk6 = Transaksi::where('jenis','Pengeluaran')
                                ->where('tanggal','like','2020-06%')
                                ->sum('nominal');

        $tk7 = Transaksi::where('jenis','Pengeluaran')
                                ->where('tanggal','like','2020-07%')
                                ->sum('nominal');

        $tk8 = Transaksi::where('jenis','Pengeluaran')
                                ->where('tanggal','like','2020-08%')
                                ->sum('nominal');

        $tk9 = Transaksi::where('jenis','Pengeluaran')
                                ->where('tanggal','like','2020-09%')
                                ->sum('nominal');

        $tk10 = Transaksi::where('jenis','Pengeluaran')
                                ->where('tanggal','like','2020-10%')
                                ->sum('nominal');

        $tk11 = Transaksi::where('jenis','Pengeluaran')
                                ->where('tanggal','like','2020-11%')
                                ->sum('nominal');

        $tk12 = Transaksi::where('jenis','Pengeluaran')
                                ->where('tanggal','like','2020-12%')
                                ->sum('nominal');

        //Pie Chart Pengeluaran
        $kat[1]=DB::table('transaksi')->where('kategori_id','1')->count();
        $kat[2]=DB::table('transaksi')->where('kategori_id','2')->count();
        $kat[3]=DB::table('transaksi')->where('kategori_id','3')->count();
        $kat[4]=DB::table('transaksi')->where('kategori_id','4')->count();
        $kat[5]=DB::table('transaksi')->where('kategori_id','5')->count();
        $kat[6]=DB::table('transaksi')->where('kategori_id','8')->count();

        //Pesanan
        $pesanann = Pesanan::all();
        $pesanan = Pesanan::orderBy('id_pesanan','desc')->offset(0)->limit(7)->get();

        //Pengguna
        $pengguna = Pengguna::all();

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
                'tm1' => $tm1,
                'tm2' => $tm2,
                'tm3' => $tm3,
                'tm4' => $tm4,
                'tm5' => $tm5,
                'tm6' => $tm6,
                'tm7' => $tm7,
                'tm8' => $tm8,
                'tm9' => $tm9,
                'tm10' => $tm10,
                'tm11' => $tm11,
                'tm12' => $tm12,
                'tk1' => $tk1,
                'tk2' => $tk2,
                'tk3' => $tk3,
                'tk4' => $tk4,
                'tk5' => $tk5,
                'tk6' => $tk6,
                'tk7' => $tk7,
                'tk8' => $tk8,
                'tk9' => $tk9,
                'tk10' => $tk10,
                'tk11' => $tk11,
                'tk12' => $tk12,
                'kat'=>$kat,
                'pesanan'=>$pesanan,
                'pengguna'=>$pengguna,
                'pesanann'=>$pesanann,
            ]
        );
    }
}
