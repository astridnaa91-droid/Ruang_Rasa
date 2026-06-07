<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin account
        User::create([
            'name' => 'Admin Ruang Rasa',
            'email' => 'admin@ruangrasa.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Customer account
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'customer@ruangrasa.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);
    }
}
