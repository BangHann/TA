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
        // RasaKopi::truncate();

        // Tambahkan data kopi
        RasaKopi::create([ 
            'kopi_id' => 1,
            'nama_rasa' => 'Gula Aren',            
            'stock' => 7,
        ]);

        RasaKopi::create([ 
            'kopi_id' => 2,
            'nama_rasa' => 'Pandan',            
            'stock' => 13,
        ]);

        RasaKopi::create([ 
            'kopi_id' => 3,
            'nama_rasa' => 'Hazelnut',            
            'stock' => 5,
        ]);

        RasaKopi::create([ 
            'kopi_id' => 4,
            'nama_rasa' => 'Vanilla',            
            'stock' => 10,
        ]);
    }
}
