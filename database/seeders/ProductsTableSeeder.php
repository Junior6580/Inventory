<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\MeasurementUnit;
use App\Models\Category;
use App\Models\Provider;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todas las unidades de medida, categorías y proveedores existentes
        $measurementUnits = MeasurementUnit::all();
        $categories = Category::all();
        $providers = Provider::all();

        // Crear un faker para datos aleatorios
        $faker = Faker::create();

        // Iterar para crear productos
        for ($i = 0; $i < 50; $i++) { // Supongamos que queremos crear 50 productos
            Product::create([
                'name' => $faker->unique()->word,
                'measurement_unit_id' => $measurementUnits->random()->id,
                'description' => $faker->paragraph,
                'category_id' => $categories->random()->id,
                'price' => $faker->numberBetween(100, 1000), // Precio aleatorio entre 100 y 1000
                'provider_id' => $providers->random()->id,
                'image' => $faker->optional()->imageUrl(),
            ]);
        }
    }
}
