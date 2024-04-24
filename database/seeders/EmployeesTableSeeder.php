<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Person;
use App\Models\Position;
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todas las personas y posiciones existentes
        $people = Person::all();
        $positions = Position::all();

        // Crear un faker para datos aleatorios
        $faker = Faker::create();

        // Iterar para crear 50 empleados
        for ($i = 0; $i < 50; $i++) {
            // Seleccionar una persona y una posición aleatoria
            $person = $people->random();
            $position = $positions->random();

            // Crear un empleado con los datos aleatorios
            Employee::create([
                'person_id' => $person->id,
                'position_id' => $position->id,
                'date' => $faker->date(),
                'state' => $faker->randomElement(['Activo', 'Inactivo']),
            ]);
        }
    }
}
