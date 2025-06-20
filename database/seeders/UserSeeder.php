<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Akun Marketing (contoh)
        User::create([
            'name' => 'Marketing 1',
            'email' => 'marketing1@example.com',
            'password' => bcrypt('password'),
            'role' => 'marketing',
        ]);

        // Akun Pembeli (contoh, opsional)
        User::create([
            'name' => 'Pembeli 1',
            'email' => 'pembeli1@example.com',
            'password' => bcrypt('password'),
            'role' => 'pembeli',
        ]);
    }
}