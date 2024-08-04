<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RawJenisKopi;
use Faker\Factory as Faker;

class RawJenisKopiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RawJenisKopi::create([
            'nama' => 'Robusta',
            'stok' => 20
        ]);

        RawJenisKopi::create([
            'nama' => 'Arabica',
            'stok' => 30
        ]);
    }
}
