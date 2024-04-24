<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shoppy;
use App\Models\Person;
use Faker\Factory as Faker;

class ShoppiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todas las personas existentes
        $people = Person::all();

        // Crear un faker para datos aleatorios
        $faker = Faker::create();

        // Iterar para crear compras
        foreach ($people as $person) {
            // Crear una compra asociada a una persona
            Shoppy::create([
                'person_id' => $person->id,
                'INVOICE_CODE' => $faker->unique()->randomNumber(), // Código de factura único generado aleatoriamente
                'date' => $faker->date(),
                'image' => $faker->optional()->imageUrl(),
            ]);
        }
    }
}
