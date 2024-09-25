<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama_karyawan' => 'Admin',
            'email' => 'admin@gmail.com',
            'jabatan' => 'Admin Aplikasi',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Indonesia',
            'password' => Hash::make('12345678'),
            'role' => 1,
        ]);
    }
}
