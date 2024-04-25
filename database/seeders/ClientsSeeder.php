<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Obtener todas las personas existentes en la base de datos
        $people = Person::all();

        // Iterar para crear clientes de ejemplo
        foreach ($people as $person) {
            // Crear un cliente asociado a la persona
            Client::create([
                'person_id' => $person->id,
            ]);
        }
    }
}
