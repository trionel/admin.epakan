<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Saldo;
use App\Pencairan;
use App\Pengguna;

class SaldoController extends Controller
{
    public function saldo()
    {
        $saldo = Saldo::orderBy('id','desc')->paginate(10);

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

        return redirect('saldo')->with("edit","Saldo berhasil diubah"); 
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
        $pencairan = Pencairan::orderBy('id','desc')->paginate(10);

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

        return redirect('pencairan')->with("edit","Saldo pengguna dengan ID {$pencairan->id_pengguna} dengan pencairan sebesar {$pencairan->saldo} berhasil dicairkan"); 
    }

    public function hapus_cair($id)
    {
        $pencairan = Pencairan::find($id);        
        $pencairan->delete(); 

        return redirect('pencairan')->with("hapus","Data pencairan berhasil dihapus"); 
    }
}
