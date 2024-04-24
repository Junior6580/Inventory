<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movement;
use App\Models\Person;
use App\Models\Inventory;
use App\Models\MovementType;
use Faker\Factory as Faker;

class MovementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todas las personas, inventarios y tipos de movimiento existentes
        $people = Person::all();
        $inventories = Inventory::all();
        $movementTypes = MovementType::all();

        // Crear un faker para datos aleatorios
        $faker = Faker::create();

        // Iterar para crear movimientos
        for ($i = 0; $i < 50; $i++) { // Supongamos que queremos crear 50 movimientos
            // Seleccionar una persona, un inventario y un tipo de movimiento aleatorio
            $person = $people->random();
            $inventory = $inventories->random();
            $movementType = $movementTypes->random();

            // Crear un movimiento con datos aleatorios
            Movement::create([
                'person_id' => $person->id,
                'inventory_id' => $inventory->id,
                'stock' => $faker->numberBetween(-50, 50), // Stock aleatorio entre -50 y 50
                'registration_date' => $faker->dateTimeThisMonth(),
                'movement_type_id' => $movementType->id,
                'observation' => $faker->optional()->sentence(),
            ]);
        }
    }
}
