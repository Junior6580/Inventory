<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MovementType;

class MovementTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Datos de tipos de movimiento de ejemplo
        $movementTypesData = [
            ['name' => 'Entrada'],
            ['name' => 'Salida'],
            // Agrega más tipos de movimiento si es necesario
        ];

        // Iterar sobre los datos y crear un registro para cada uno
        foreach ($movementTypesData as $movementTypeData) {
            MovementType::create($movementTypeData);
        }
    }
}
