<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function index()
    {
        return view('auth.login-admin');
    }

    public function login(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Cek kredensial
        if (Auth::attempt($validatedData)) {
            // Jika berhasil, redirect ke halaman admin
            return redirect()->route('admin.dashboard');
        }

        // Jika gagal, kembali ke form login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password tidak valid.',
        ])->withInput();
    }

    public function logoutAdmin()
    {
        // Melakukan logout
        Auth::logout();

        // Mengalihkan pengguna kembali ke halaman login dengan pesan sukses
        return redirect()->route('admin.login')->with('success', 'Anda telah berhasil keluar.');
    }
}
