<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaksi;
use Faker\Factory as Faker;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            Transaksi::create([
                'name' => 'User Seeder', // Diganti dengan name_user yang sesuai
                'id_user' => $faker->numberBetween(1, 4),
                'id_alamat' => $faker->numberBetween(1, 4),
                'total_price' => $faker->numberBetween(10000, 100000),
                'bukti_payment' => $faker->randomElement(['1716714624.jpeg', null]),
                'order_telah_diantar' => $faker->randomElement(['Belum diantar', 'Sudah diantar']),
                'created_at' => $faker->dateTimeThisMonth(),
                'delivery' => $faker->randomElement(['yes', 'no']),
                // 'no_meja' => $faker->numberBetween(1, 20),
                // 'status_transaksi' => $faker->randomElement(['Unpaid', 'Paid']),
                // 'address' => $faker->address,
                // 'phone' => $faker->phoneNumber,
                // 'qty' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
