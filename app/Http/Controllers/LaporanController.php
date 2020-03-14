<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Transaksi;
use App\Exports\LaporanExport; 
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();    
 
        // passing data kategori ke view laporan 
        return view('laporan.laporan',['kategori' => $kategori]);
    }

    public function hasil(Request $req) 
    { 
        $req->validate([ 
            'dari' => 'required', 
            'sampai' => 'required' 
        ]);
        // data kategori
        $kategori = Kategori::all(); 

        // data filter
        $dari = $req->dari;
        $sampai = $req->sampai;
        $id_kategori = $req->kategori;
        $jenis = $req->jenis;
        // $jml = $req->jml;

        // foreach ($req->jml as $jml)
        // {
        //     $laporan = Transaksi::where('kategori_id',$id_kategori)
        //     ->whereDate('tanggal','>=',$dari)
        //     ->whereDate('tanggal','<=',$sampai)
        //     ->orderBy('id','desc')->get();
        // }

        // periksa kategori yang dipiliih
        if($id_kategori == "semua"){
        // jika semua, tampilkan semua transaksi
            $laporan = Transaksi::whereDate('tanggal','>=',$dari)
            ->whereDate('tanggal','<=',$sampai)
            ->orderBy('id','desc')->get();
        }else{
        // jika yang dipilih bukan semua, 
        //tampilkan transaksi berdasarkan kategori yang dipilih
            $laporan = Transaksi::whereIn('kategori_id',$id_kategori)
            ->whereDate('tanggal','>=',$dari)
            ->whereDate('tanggal','<=',$sampai)
            ->orderBy('id','desc')->get();
        }

        // if($jenis == "semua"){
        //     // jika semua, tampilkan semua jenis transaksi
        //         $laporan = Transaksi::whereDate('tanggal','>=',$dari)
        //         ->whereDate('tanggal','<=',$sampai)
        //         ->orderBy('id','desc')->get();
        //     }else{
        //     // jika yang dipilih bukan semua, 
        //     //tampilkan transaksi berdasarkan jenis yang dipilih
        //         $laporan = Transaksi::where('jenis',$jenis)
        //         ->whereDate('tanggal','>=',$dari)
        //         ->whereDate('tanggal','<=',$sampai)
        //         ->orderBy('id','desc')->get();
        //     }
        // passing data laporan ke view laporan
        return view('laporan.laporan_hasil',['laporan' => $laporan, 'kategori' => $kategori]);
    }

    public function print(Request $req)
    {
        $req->validate([
            'dari' => 'required',
            'sampai' => 'required'
        ]);

        // data kategori
        $kategori = Kategori::all(); 

        // data filter
        $dari = $req->dari;
        $sampai = $req->sampai;
        $id_kategori = $req->kategori;

        // periksa kategori yang dipiliih
        if($id_kategori == "semua"){
        // jika semua, tampilkan semua transaksi
            $laporan = Transaksi::whereDate('tanggal','>=',$dari)
            ->whereDate('tanggal','<=',$sampai)
            ->orderBy('id','desc')->get();
        }else{
        // jika yang dipilih bukan semua, tampilkan transaksi berdasarkan kategori yang dipilih
            $laporan = Transaksi::whereIn('kategori_id',$id_kategori)
            ->whereDate('tanggal','>=',$dari)
            ->whereDate('tanggal','<=',$sampai)
            ->orderBy('id','desc')->get();
        }
        // passing data laporan ke view laporan
        return view('laporan.laporan_print',['laporan' => $laporan, 'kategori' => $kategori]);
    }

    public function excel()
    {
        return Excel::download(new LaporanExport, 'laporan_keuangan_epakan.xlsx'); 
    }
}
