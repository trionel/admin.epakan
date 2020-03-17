<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Saldo;
use App\Pencairan;

class SaldoController extends Controller
{
    public function saldo()
    {
        $saldo = Saldo::orderBy('id','desc')->paginate(10);

        return view('saldo.saldo_masuk',['saldo' => $saldo]);
    }

    public function pencairan()
    {
        $pencairan = Pencairan::orderBy('id','desc')->paginate(10);

        return view('saldo.pencairan',['pencairan' => $pencairan]);
    }

    public function cairkan($id)
    {
        $pencairan = Pencairan::find($id); 
        
        return view('saldo.pencairan',['pencairan' => $pencairan]); 
    }

    public function cairkan_proses($id, Request $data)
    {
        $data->validate([
        'status' => 'required', 
        ]);

        $pencairan = Pencairan::find($id); 
 
        $pencairan->status = $data->status; 
        
        $pencairan->save();

        return redirect('pencairan'); 
    }

    public function hapus_cair($id)
    {
        $pencairan = Pencairan::find($id);        
        $pencairan->delete(); 

        return redirect('pencairan')->with("hapus","Data pencairan berhasil dihapus"); 
    }
}
