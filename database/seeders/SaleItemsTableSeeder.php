<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SaleItem;
use App\Models\Sale;
use App\Models\Product;
use Faker\Factory as Faker;

class SaleItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todas las ventas y productos existentes
        $sales = Sale::all();
        $products = Product::all();

        // Crear un faker para datos aleatorios
        $faker = Faker::create();

        // Iterar para crear elementos de venta aleatorios
        for ($i = 0; $i < 50; $i++) {
            // Seleccionar una venta y un producto aleatorio
            $sale = $sales->random();
            $product = $products->random();

            // Calcular una cantidad y precio unitario aleatorios
            $quantity = $faker->numberBetween(1, 10);
            $unitPrice = $faker->randomFloat(2, 1, 100);

            // Crear un elemento de venta con datos aleatorios
            SaleItem::create([
                'sale_id' => $sale->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
            ]);
        }
    }
}
