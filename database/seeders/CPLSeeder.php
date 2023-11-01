<?php

namespace Database\Seeders;

use App\Models\CPLModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Schema;

class CPLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        CPLModel::truncate();
        Schema::enableForeignKeyConstraints();

        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 50; $i++){

            // insert data ke table barang menggunakan Faker
            CPLModel::create([
                'kode_cpl' => $faker->randomNumber(5, true),
                'deskripsi_cpl' => $faker->sentence(),

            ]);
        }
    }
}
