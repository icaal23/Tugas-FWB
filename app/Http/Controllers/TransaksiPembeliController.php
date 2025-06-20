<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Transaksi;
use App\Models\Mobil;

class TransaksiPembeliController extends Controller
{
    public function beli(Mobil $mobil)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek stok tersedia
        if ($mobil->stok < 1) {
            return redirect()->back()->with('error', 'Stok mobil tidak tersedia.');
        }

        $jumlah = 1;
        $total = $mobil->harga * $jumlah;

        try {
            DB::transaction(function () use ($mobil, $jumlah, $total) {
                // Kurangi stok mobil
                $mobil->decrement('stok', $jumlah);

                // Simpan transaksi
                Transaksi::create([
                    'pembeli_id'   => Auth::id(),
                    'mobil_id'     => $mobil->id,
                    'jumlah'       => $jumlah,
                    'total_harga'  => $total,
                    'status'       => 'proses'
                ]);
            });

            return redirect()->back()->with('success', 'Transaksi berhasil dilakukan!');
        } catch (\Exception $e) {
            Log::error('Gagal transaksi: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat transaksi.');
        }
    }
}
