<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider;
use App\Models\Person;

class ProvidersTableSeeder extends Seeder
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

        // Iterar para crear proveedores
        foreach ($people as $person) {
            // Crear un proveedor asociado a una persona
            Provider::create([
                'company' => 'Proveedor ' . $person->id, // Puedes ajustar esto según tus necesidades
                'person_id' => $person->id,
            ]);
        }
    }
}
