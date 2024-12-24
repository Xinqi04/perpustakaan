<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Anwar Fadil',
            'username' => 'anwarfadil',
            'phone_number' => '081234567890',
            'email' => 'anwarfadil@example.com',
            'address' => 'Jl. Contoh No. 123, Bandung',
            'password' => Hash::make('password123'), // Gantilah dengan password yang aman
            'role' => 'member',
        ]);

        // Menambahkan data user kedua
        User::create([
            'name' => 'Riza Anwar Fadil',
            'username' => 'admin1',
            'phone_number' => '081234567891',
            'email' => 'riza@example.com',
            'address' => 'Jl. Contoh No. 124, Bandung',
            'password' => Hash::make('admin123'), // Gantilah dengan password yang aman
            'role' => 'admin', // Role sebagai admin
        ]);
    }
}
