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
            'name_user' => 'Banghan',
            'role' => 'admin',
            'password' => Hash::make('123'), // Ganti dengan password yang diinginkan
            // 'username' => 'admin banghan',
            'user_jenis_kelamin' => 'Laki-Laki',
            'user_foto' => 'pakbos1.jpg',
            // 'user_status' => 1,
            'alamat' => 'RT.006/RW.038, Bojong Rawalumbu, Kec. Rawalumbu, Kota Bks, Jawa Barat 17116',
            'no_hp' => '1234567890',
            'email' => 'banghan@mail.com',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name_user' => 'Paran H',
            'role' => 'user',
            'password' => Hash::make('123'), // Ganti dengan password yang diinginkan
            // 'username' => 'admin banghan',
            'user_jenis_kelamin' => 'Laki-Laki',
            'user_foto' => 'paran.jpg',
            // 'user_status' => 1,
            'alamat' => 'RT.006/RW.038, Bojong Rawalumbu, Kec. Rawalumbu, Kota Bekasi, Jawa Barat 17116',
            'no_hp' => '1234567890',
            'email' => 'paran@mail.com',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name_user' => 'Parel',
            'role' => 'user',
            'password' => Hash::make('123'), // Ganti dengan password yang diinginkan
            // 'username' => 'admin banghan',
            'user_jenis_kelamin' => 'Laki-Laki',
            'user_foto' => 'rel.jpg',
            // 'user_status' => 1,
            'alamat' => 'Serang, Kec. Serang, Kota Serang, Banten',
            'no_hp' => '1234567890',
            'email' => 'rel@mail.com',
            'email_verified_at' => now(),
        ]);
    }
}