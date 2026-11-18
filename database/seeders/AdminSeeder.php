<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Membuat akun Admin Perpustakaan dan Mahasiswa default.
     */
    public function run(): void
    {
        // 1. Akun Admin Perpustakaan
        if (!User::where('email', 'admin@telkomlibrary.ac.id')->exists()) {
            User::create([
                'name'              => 'Admin Perpustakaan',
                'email'             => 'admin@telkomlibrary.ac.id',
                'password'          => Hash::make('admin123'),
                'email_verified_at' => now(),
                'role'              => 'admin',
            ]);
        }

        // 2. Akun Mahasiswa Dummy untuk Pengujian Role & Middleware
        if (!User::where('email', 'mahasiswa@telkomlibrary.ac.id')->exists()) {
            User::create([
                'name'              => 'Rio Mahasiswa',
                'email'             => 'mahasiswa@telkomlibrary.ac.id',
                'password'          => Hash::make('mahasiswa123'),
                'email_verified_at' => now(),
                'role'              => 'mahasiswa',
            ]);
        }
    }
}
