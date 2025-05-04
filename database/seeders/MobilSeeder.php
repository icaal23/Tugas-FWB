<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mobil;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mobil::create([
            'nama_mobil' => 'Supra Mk4',
            'merk' => 'Toyota',
            'tahun' => 2022,
            'harga' => 250000000,
            'stok' => 10,
        ]);

        Mobil::create([
            'nama_mobil' => 'Civic Type R',
            'merk' => 'Honda',
            'tahun' => 2023,
            'harga' => 380000000,
            'stok' => 5,
        ]);
    }
}
