<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function postlogin(Request $request)
    {
        //    dd($request->all());
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/beranda');
        }
        return redirect('login');
    }
    public function logout(Request $request)
    {
        // 1. Proses Logout dari Guard (Hapus autentikasi user saat ini)
        Auth::logout();

        // 2. Invalidasi Session (Hapus semua data session server untuk user ini)
        // Ini mencegah penyerang menggunakan session ID lama (Session Fixation Attack)
        $request->session()->invalidate();

        // 3. Regenerasi Token CSRF
        // Mencegah serangan CSRF pada form login berikutnya
        $request->session()->regenerateToken();

        // 4. Redirect ke halaman login atau beranda dengan pesan sukses
        return redirect('/')->with('success', 'Anda berhasil logout.');
    }
}
