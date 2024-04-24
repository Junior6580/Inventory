<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inventory;
use App\Models\Person;
use App\Models\Warehouse;
use App\Models\Product;
use Faker\Factory as Faker;

class InventoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todas las personas, almacenes y productos existentes
        $people = Person::all();
        $warehouses = Warehouse::all();
        $products = Product::all();

        // Crear un faker para datos aleatorios
        $faker = Faker::create();

        // Iterar para crear inventarios
        for ($i = 0; $i < 50; $i++) { // Supongamos que queremos crear 50 registros de inventario
            // Seleccionar una persona, un almacén y un producto aleatorio
            $person = $people->random();
            $warehouse = $warehouses->random();
            $product = $products->random();

            // Crear un registro de inventario con datos aleatorios
            Inventory::create([
                'person_id' => $person->id,
                'warehouse_id' => $warehouse->id,
                'product_id' => $product->id,
                'stock' => $faker->numberBetween(0, 100), // Stock aleatorio entre 0 y 100
                'expiration_date' => $faker->optional()->date(),
                'state' => $faker->randomElement(['Disponible', 'No disponible']),
            ]);
        }
    }
}
