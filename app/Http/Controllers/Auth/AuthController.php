<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;
            if ($role == 'warga') {
                return redirect()->route('warga.index');
            } elseif ($role == 'admin') {
                return redirect()->route('users.index');
            } elseif ($role == 'kepala') {
                return redirect()->route('kepala.index');
            } else {
                Auth::logout();
                return redirect()->route('login')->with(['message' => 'Anda belum terdaftar, mohon register']);
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'error' => 'Gagal login, email atau password salah',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with(['message' => 'Anda logout']);
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'warga',
        ]);

        return redirect()->route('login')->with('success', 'Register berhasil');
    }

}
