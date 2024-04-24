<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::beginTransaction(); // Iniciar transacción

        $this->call(PeopleTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(MeasurementUnitsTableSeeder::class);
        $this->call(MovementTypesTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(SalesTableSeeder::class);
        $this->call(ShoppiesTableSeeder::class);
        $this->call(SaleItemsTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(WarehousesTableSeeder::class);
        $this->call(InventoriesTableSeeder::class);
        $this->call(MovementsTableSeeder::class);

        DB::commit(); // Finalizar transacción

    }
}
