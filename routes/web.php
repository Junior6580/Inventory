<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ShoppyController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/warehouses', [WarehouseController::class, 'index'])->name('warehouses');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');

Route::get('/providers', [ProviderController::class, 'index'])->name('providers');

Route::get('/shopping', [ShoppyController::class, 'index'])->name('shopping');

Route::get('/sales', [SaleController::class, 'index'])->name('sales');
Route::get('/ruta/para/generar/pdf', [SaleController::class, 'generatePDF'])->name('generatePDF');


Route::get('/configuration', [ConfigurationController::class, 'index'])->name('configuration');
