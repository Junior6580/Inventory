<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Registrar o actualizar usuario para Junior Stiven Medina Hernandez (NO MODIFICAR)
       $person = Person::where('document_number',1079173785)->first(); // Consultar Persona
       User::updateOrCreate(['nickname' => 'JSM6580'], [ // Actualizar o crear usuario
           'person_id' => $person->id,
           'email' =>  $person->email,
       ]);
    }
}

