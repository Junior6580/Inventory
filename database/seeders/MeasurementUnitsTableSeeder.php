<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MeasurementUnit;

class MeasurementUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Datos de unidades de medida de ejemplo
        $units = [
            [
                'name' => 'Metro',
                'abbreviation' => 'm',
                'minimum_unit_measure' => 'Centímetro',
                'conversion_factor' => 100,
            ],
            [
                'name' => 'Kilogramo',
                'abbreviation' => 'kg',
                'minimum_unit_measure' => 'Gramo',
                'conversion_factor' => 1000,
            ],
            // Agrega más datos de unidades de medida si es necesario
        ];

        // Itera sobre los datos y crea un registro para cada uno
        foreach ($units as $unit) {
            MeasurementUnit::create($unit);
        }
    }
}
