<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
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

        // Iterar para crear categorías
        for ($i = 0; $i < 10; $i++) { // Supongamos que queremos crear 10 categorías
            // Generar un nombre único para la categoría
            $name = $faker->unique()->word;

            // Crear la categoría con el nombre generado
            Category::create([
                'name' => $name,
            ]);
        }
    }
}
