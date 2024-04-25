<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Person;
use Faker\Factory as Faker;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener todas los clientes existentes en la base de datos
        $clients = Client::all();

        // Obtener todas las personas existentes en la base de datos
        $people = Person::all();

        // Iterar para crear ventas de ejemplo
        for ($i = 0; $i < 50; $i++) { // Supongamos que queremos crear 50 ventas
            // Seleccionar una persona aleatoria como el vendedor
            $person = $people->random();

            // Seleccionar un cliente aleatorio
            $client = $clients->random();

            // Generar una fecha aleatoria dentro del mes de abril de 2024
            $date = $faker->dateTimeBetween('2024-04-01', '2024-04-30')->format('Y-m-d');

            // Crear una venta con datos aleatorios
            Sale::create([
                'person_id' => $person->id,
                'voucher_code' => $faker->unique()->numberBetween(1000, 9999), // Código de comprobante único aleatorio
                'date' => $date, // Usar la fecha aleatoria generada
                'client_id' => $client->id, // Usar el ID del cliente seleccionado aleatoriamente
            ]);
        }
    }
}
