<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\JenisKopi;

class JenisKopiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan data tabel sebelum menambahkan data
        // RasaKopi::truncate();
        $faker = Faker::create();
        // Asumsikan Anda memiliki 6 kopi_id yang berbeda (1 hingga 6)
        for ($kopiId = 1; $kopiId <= 5; $kopiId++) {
            JenisKopi::create([
                'kopi_id' => $kopiId,
                'nama_jenis' => 'Robusta',
            ]);

            JenisKopi::create([
                'kopi_id' => $kopiId,
                'nama_jenis' => 'Arabica',
            ]);
        }
    }
}
