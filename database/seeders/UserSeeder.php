<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Muhammad Faisal',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Faiss',
            'email' => 'marketing@example.com',
            'password' => Hash::make('password'),
            'role' => 'marketing',
        ]);

        User::create([
            'name' => 'Ical',
            'email' => 'pembeli@example.com',
            'password' => Hash::make('password'),
            'role' => 'pembeli',
        ]);
    }
}
