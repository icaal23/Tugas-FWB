<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = \App\Models\User::find(Auth::id());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diupdate');
    }

    public function upload(Request $request)
{
    $request->validate([
        'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);
    $user = \App\Models\User::find(Auth::id());
    $path = $request->file('foto')->store('profile', 'public');
    $user->foto = $path;
    $user->save();
    return redirect()->route('admin.profile')->with('success', 'Foto profil berhasil diupload');
}
}