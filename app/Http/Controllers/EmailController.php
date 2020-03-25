<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function kirim_email(Request $request)
    {
        try{
            Mail::send('email', ['nama' => $request->nama, 'pesan' => $request->pesan], function ($message) use ($request)
            {
                $message->subject($request->judul);
                $message->from('trionelonel@gmail.com', 'Admin ePakan.id');
                $message->to($request->email);
            });
            return back()->with('sukses','Email berhasil dikirim');
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }
}
