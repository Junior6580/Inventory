<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;
use Faker\Factory as Faker;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Position::create([
                'name' => $faker->jobTitle,
                'description' => $faker->paragraph,
            ]);
        }
    }
}
