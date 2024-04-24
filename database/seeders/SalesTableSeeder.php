<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Person;
use App\Models\Employee;
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
        // Obtener todas las personas y empleados existentes
        $people = Person::all();
        $employees = Employee::all();

        // Crear un faker para datos aleatorios
        $faker = Faker::create();

        // Iterar para crear 50 ventas
        for ($i = 0; $i < 50; $i++) {
            // Seleccionar una persona y un empleado aleatorio
            $person = $people->random();
            $employee = $employees->random();

            // Crear un código de comprobante único (opcional)
            $voucherCode = null;
            do {
                $voucherCode = $faker->unique()->randomNumber(6);
            } while (Sale::where('voucher_code', $voucherCode)->exists());

            // Crear una venta con datos aleatorios
            Sale::create([
                'person_id' => $person->id,
                'voucher_code' => $voucherCode,
                'date' => $faker->date(),
                'employee_id' => $employee->id,
            ]);
        }
    }
}
