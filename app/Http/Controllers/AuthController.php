<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view('auth.login');
    }

    public function indexRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' => 'required|email',
        ]);

        User::create($request->all());
        return redirect()->route('indexLogin')->with('success', 'Daftar Berhasil');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Email atau Kata Sandi Salah');
        }

        Auth::login($user);
        return redirect()->route('indexDashboard')->with('success', 'Masuk Berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('indexLogin')->with('success', 'Keluar Berhasil!');
    }
}
