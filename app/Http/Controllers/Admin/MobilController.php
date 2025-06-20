<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::with('marketing')->get();
        $users = User::where('role', 'marketing')->get();
        return view('admin.mobil.index', compact('mobils', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'tahun' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'gambar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'marketing_id' => ['required', 'exists:users,id'],
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('mobil', 'public');
        }

        Mobil::create($data);

        return redirect()->route('admin.mobil.index')->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'merk' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'tahun' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'gambar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'marketing_id' => ['required', 'exists:users,id'],
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($mobil->gambar) {
                Storage::disk('public')->delete($mobil->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('mobil', 'public');
        }

        $mobil->update($data);

        return redirect()->route('admin.mobil.index')->with('success', 'Mobil berhasil diperbarui.');
    }

    public function destroy(Mobil $mobil)
    {
        if ($mobil->gambar) {
            Storage::disk('public')->delete($mobil->gambar);
        }

        $mobil->delete();

        return redirect()->route('admin.mobil.index')->with('success', 'Mobil berhasil dihapus.');
    }
}