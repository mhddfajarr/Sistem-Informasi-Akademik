<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('guru')->attempt($data)) {
            $request->session()->regenerate();
            $request->session()->put("role", "guru");
            return redirect()->intended('/G_jadwal');
        } elseif (Auth::guard('siswa')->attempt($data)) {
            $request->session()->regenerate();
            $request->session()->put("role", "siswa");
            return redirect()->intended('/S_jadwal');
        } elseif (Auth::guard('TU')->attempt($data)) {
            $request->session()->regenerate();
            $request->session()->put("role", "TU");
            return redirect()->intended('/jadwal');
        }

        return back()->with('loginError', 'Username atau password salah!');
    }

    public function logout()
    {
        if (Auth::guard('guru')->check()) {
            Auth::guard('guru')->logout();
        } elseif (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        } elseif (Auth::guard('TU')->check()) {
            Auth::guard('TU')->logout();
        }
        return redirect('/login');
    }
}
