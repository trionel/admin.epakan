<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Hash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function logout()
    {
        auth::logout();
        return redirect('login');
    }

    public function ganti_password() 
    {
       return view('gantipassword'); 
    }

    public function ganti_password_aksi(Request $request)
    {

        // perika apakah inputan "password sekarang (current password)" sesuai dengan password sekarang
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        // jika tidak sesuai, alihkan halaman kembali ke form ganti password
        // sambil mengirimkan pemberitahuan bahwa password tidak sesuai
            return redirect()->back()->with("error","Password sekarang tidak sesuai.");
        }

        // periksa jika password baru sama dengan password yang sekarang
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        // jika password baru yang diinput sama dengan password lama (password sekarang)
        // alihkan kembali ke form ganti password sambil mengirim pemberitahuan
            return redirect()->back()->with("error","Password baru tidak boleh sama dengan password sekarang.");
        }

        // membuat form validasi
        // password sekarang wajib diisi, password baru harus diisi,harus string, minimal 6 karakter, 
        // dan harus sama dengan form konfirmasi password (connfirmation)
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:5|confirmed',
        ]);

        // Ganti password user/pengguna yang sedang login dengan password baru
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        // kembalikan halaman dan kirim pemberitahuan ganti password sukses
        return redirect()->back()->with("sukses","Password berhasil diganti !");

    }
}
