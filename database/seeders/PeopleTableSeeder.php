<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Person;
use Faker\Factory as Faker;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
          // Consulta o registro de datos para Junior Stiven Medina Hernandez
          Person::firstOrCreate(['document_number' => 1079173785],[ // Consultar o registrar Persona
            'document_type' => 'Cédula de ciudadanía',
            'date_of_issue' => '2023-02-10',
            'first_name' => 'JUNIOR STIVEN',
            'first_last_name' => 'MEDINA',
            'second_last_name' => 'HERNANDEZ',
            'date_of_birth' => '2005-01-25',
            'gender' => 'Masculino',
            'address' => 'Parcela 12 VDA Horizonte',
            'email' => 'jsmedinah5873@gmail.com',
            'telephone1' => '3245610826',
        ]);
    }
}
