<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use App\Models\Transaksi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMobil = Mobil::count();
        $totalTransaksi = Transaksi::count();
        $totalUser = User::count();

        return view('admin.dashboard', compact('totalMobil', 'totalTransaksi', 'totalUser'));
    }
}