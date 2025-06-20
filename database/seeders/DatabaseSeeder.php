<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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
