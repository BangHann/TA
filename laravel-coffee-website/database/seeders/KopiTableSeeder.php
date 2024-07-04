<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kopi;

class KopiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan data tabel sebelum menambahkan data
        // Kopi::truncate();

        // Tambahkan data kopi
        Kopi::create([
            'jenis_kopi' => 'Caramel',
            'foto' => 'kopi_caramel.jpg',
            'harga' => 15000,
            // 'stok' => 45,
            'deskripsi' => 'Terbuat dari campuran espresso segar dan sirup karamel, minuman ini menawarkan perpaduan sempurna antara pahitnya kopi dan manisnya karamel.'
        ]);

        Kopi::create([
            'jenis_kopi' => 'Gula Aren',
            'foto' => 'kopi_gula-aren.jpg',
            'harga' => 12000,
            // 'stok' => 30,
            'deskripsi' => 'Gula aren memberikan sentuhan manis yang lembut dan karamel, berbeda dengan gula putih biasa, menambah dimensi rasa yang unik pada kopi.'
        ]);

        Kopi::create([
            'jenis_kopi' => 'Hazelnut',
            'foto' => 'kopi_hazelnut.jpg',
            'harga' => 17000,
            // 'stok' => 25,
            'deskripsi' => 'Minuman kopi yang memanjakan dengan aroma kacang hazelnut yang kaya dan rasa yang lembut.'
        ]);

        Kopi::create([
            'jenis_kopi' => 'Pandan',
            'foto' => 'kopi_pandan.jpg',
            'harga' => 12000,
            // 'stok' => 30,
            'deskripsi' => 'Minuman kopi unik yang menggabungkan kelezatan kopi dengan aroma dan rasa khas daun pandan.'
        ]);

        Kopi::create([
            'jenis_kopi' => 'Vanilla',
            'foto' => 'kopi_vanilla.jpg',
            'harga' => 17000,
            // 'stok' => 25,
            'deskripsi' => 'Terbuat dari campuran espresso berkualitas dan sirup vanila, minuman ini menawarkan keseimbangan sempurna antara kekuatan kopi dan kelembutan rasa vanila yang lembut dan aromatik.'
        ]);

        // Kopi::create([
        //     'jenis_kopi' => 'Red Velvet',
        //     'foto' => 'RedVelvet.png',
        //     'harga' => 15000,
        //     // 'stok' => 45,
        //     'deskripsi' => 'Terinspirasi dari kue Red Velvet. Minuman ini biasanya terdiri dari campuran berbagai bahan, termasuk susu, sirup vanila, pewarna merah (untuk memberikan warna merah yang khas).'
        // ]);
    }
}
