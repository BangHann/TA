<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RasaKopi;

class RasaKopiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan data tabel sebelum menambahkan data
        RasaKopi::truncate();

        // Tambahkan data kopi
        RasaKopi::create([ 
            'nama_rasa' => 'Gula Aren'
        ]);

        RasaKopi::create([ 
            'nama_rasa' => 'Pandan'
        ]);

        RasaKopi::create([ 
            'nama_rasa' => 'Hazelnut'
        ]);

        RasaKopi::create([ 
            'nama_rasa' => 'Vanilla'
        ]);
    }
}
