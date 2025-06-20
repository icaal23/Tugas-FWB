<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['user', 'mobil'])->latest()->get();
        return view('admin.transaksi.index', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('admin.transaksi.show', compact('transaksi'));
    }

    public function create()
    {
        return view('admin.transaksi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Tambahkan validasi sesuai kebutuhan field transaksi
            // Contoh: 'mobil_id' => 'required', 'user_id' => 'required', 'total' => 'required|numeric'
        ]);
        Transaksi::create($request->all());
        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('admin.transaksi.edit', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $request->validate([
            // Tambahkan validasi sesuai kebutuhan field transaksi
        ]);
        $transaksi->update($request->all());
        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil diupdate');
    }

    public function destroy($id){
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
}

}