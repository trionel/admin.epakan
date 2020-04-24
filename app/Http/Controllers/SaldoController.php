<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Saldo;
use App\Pencairan;
use App\Pengguna;
use App\Mitra;
use App\Transaksi;

class SaldoController extends Controller
{
    public function saldo()
    {
        $saldo = Saldo::orderBy('created_at','desc')->paginate(10);

        return view('saldo.saldo_masuk',['saldo' => $saldo]);
    }

    public function edit_saldo($id)
    {
        $saldo = Saldo::find($id);   
        return view('saldo.saldo_edit',['saldo' => $saldo]);
    }

    public function update_saldo($id, Request $data)
    {
        $data->validate([
            'id_pesanan'=>'required',
            'id_pengguna'=>'required',
            'saldo'=>'required',
        ]);

        $saldo = Saldo::where('id',$id)->first();

        $saldo->id_pesanan = $data->id_pesanan;
        $saldo->id_pengguna = $data->id_pengguna;
        $saldo->saldo = $data->saldo;

        $saldo->save();

        return redirect('saldo')->with("edit","Saldo dengan ID Pesanan : {$saldo->id_pesanan} berhasil diubah"); 
    }

    public function hapus_saldo($id)
    {
        // menghapus transaksi berdasarkan id kategori yang dihapus
        $saldo = Saldo::where('id',$id);        
        $saldo->delete(); 

        return redirect('saldo')->with("hapus","Saldo berhasil dihapus"); 
    }

    public function pencairan()
    {
        $pencairan = Pencairan::orderBy('created_at','desc')->paginate(10);

        return view('saldo.pencairan',['pencairan' => $pencairan]);
    }

    public function cairkan($id)
    {
        $pencairan = Pencairan::where('id',$id)->first();
        // return $pencairan; 
        
        return view('saldo.cairkan',[
            'pencairan' => $pencairan,
            ]); 
    }

    public function cairkan_proses($id, Request $data)
    {
        $data->validate([
        'status' => 'required', 
        ]);

        $pencairan = Pencairan::find($id); 
 
        $pencairan->status = $data->status; 
        
        $pencairan->save();

        $trans = Transaksi::orderBy('id','desc')->first();
            
        $saldo = $trans->saldo - $pencairan->saldo;

        Transaksi::insert([ 
            'tanggal' => date('Y-m-d H:i:s'),
            'jenis' => 'pengeluaran', 
            'kategori_id' => '8', 
            'nominal' => $pencairan->saldo, 
            'keterangan' => $pencairan->id_pengguna, 
            'saldo' => $saldo
            ]);

        return redirect('pencairan')->with("edit","Saldo pengguna dengan ID {$pencairan->id_pengguna} dengan pencairan sebesar {$pencairan->saldo} berhasil dicairkan"); 
    }

    public function hapus_cair($id)
    {
        $pencairan = Pencairan::find($id);        
        $pencairan->delete(); 

        return redirect('pencairan')->with("hapus","Data pencairan ID {$pencairan->id} sebesar Rp.{$pencairan->saldo} berhasil dihapus"); 
    }

    public function hasil_saldo(Request $req)
    {
        $req->validate([
            'dari' => 'required',
            'sampai' => 'required'
        ]); 

        $saldo = Saldo::all();

        $dari = $req->dari;
        $sampai = $req->sampai;

        $saldo = Saldo::whereDate('created_at','>=',$dari)
        ->whereDate('created_at','<=',$sampai)
        ->orderBy('created_at','desc')->get();

        return view('saldo.saldo_hasil',['saldo' => $saldo]);        
    }

    public function hasil_pencairan(Request $req)
    {
        $req->validate([
            'dari' => 'required',
            'sampai' => 'required'
        ]); 

        $pencairan = Pencairan::all();

        $dari = $req->dari;
        $sampai = $req->sampai;

        $pencairan = Pencairan::whereDate('created_at','>=',$dari)
        ->whereDate('created_at','<=',$sampai)
        ->orderBy('created_at','desc')->get();

        return view('saldo.pencairan_hasil',['pencairan' => $pencairan]);
    }
}
