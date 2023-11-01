<?php

namespace Database\Seeders;

use App\Models\CPMKModel;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CPMKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        CPMKModel::truncate();
        Schema::enableForeignKeyConstraints();

        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 50; $i++){

            // insert data ke table barang menggunakan Faker
            CPMKModel::create([
                'kode_cpmk' => $faker->randomNumber(5, true),
                'deskripsi_cpmk' => $faker->sentence(),

            ]);
        }
    }
}
