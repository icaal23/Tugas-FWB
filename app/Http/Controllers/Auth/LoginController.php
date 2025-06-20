<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect()->route('admin.mobil.index')->with('success', 'Login berhasil!');
        // }

        // return back()->withErrors(['email' => 'Email atau password salah.']);

         $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
        Auth::login($user);
        $request->session()->regenerate();
        if(Auth::user()->role === 'admin'){
        return redirect()->route('admin.mobil.index')->with('success','Login berhasil');}

        elseif(Auth::user()->role === 'marketing'){
        return redirect()->route('admin.mobil.index')->with('success','Login berhasil');}
        
        elseif(Auth::user()->role === 'pembeli'){
        return redirect()->route('utama')->with('success','Login berhasil');}
    }

    return redirect()->route('login')->with('failed', 'Username atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}