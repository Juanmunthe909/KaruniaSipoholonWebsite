<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Data awal untuk tabel "kas"
        $data = [];

        // Ubah jumlah data yang ingin di-generate, misalnya 50 data
        $dataCount = 50;

        for ($i = 0; $i < $dataCount; $i++) {
            $data[] = [
                'inout_date' => $faker->date,
                'amount' => $faker->randomFloat(2, 100, 10000),
                'in_out' => $faker->randomElement(['in', 'out']),
                'transaction_type' => $faker->word,
                'id_source' => $faker->uuid,
                'status' => $faker->randomElement(['Completed', 'Pending', 'Canceled']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Masukkan data ke tabel "kas"
        DB::table('kas')->insert($data);
    }
}
