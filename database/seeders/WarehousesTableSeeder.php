<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warehouse;
use Faker\Factory as Faker;

class WarehousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear un faker para datos aleatorios
        $faker = Faker::create();

        // Iterar para crear almacenes
        for ($i = 0; $i < 10; $i++) { // Supongamos que queremos crear 10 almacenes
            Warehouse::create([
                'name' => $faker->unique()->company,
                'description' => $faker->paragraph,
            ]);
        }
    }
}
