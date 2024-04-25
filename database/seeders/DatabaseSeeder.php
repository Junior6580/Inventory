<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\CategoriesTableSeeder;
use Database\Seeders\ClientsTableSeeder;
use Database\Seeders\EmployeesTableSeeder;
use Database\Seeders\InventoriesTableSeeder;
use Database\Seeders\MovementsTableSeeder;
use Database\Seeders\MovementTypesTableSeeder;
use Database\Seeders\PeopleTableSeeder;
use Database\Seeders\PositionsTableSeeder;
use Database\Seeders\ProductsTableSeeder;
use Database\Seeders\ProvidersTableSeeder;
use Database\Seeders\SaleItemsTableSeeder;
use Database\Seeders\SalesTableSeeder;
use Database\Seeders\ShoppiesTableSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\WarehousesTableSeeder;
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
        $this->call(ClientsSeeder::class);
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
