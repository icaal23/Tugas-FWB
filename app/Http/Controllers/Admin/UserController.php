<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Mobil;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
        // return view('users.menu', compact('users'));
    }
    public function pembeli(){
        $users = User::all();
        $mobils = Mobil::latest()->get(); // ambil semua mobil dari database
        return view('users.utama', compact('users', 'mobils'));
    }

    public function menu(){
        $mobils = \App\Models\Mobil::latest()->get();
        return view('users.menu', compact('mobils'));
    }

    public function create()
    {
        
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('admin.user.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus');
    }
}