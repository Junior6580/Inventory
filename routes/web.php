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



Auth::routes();

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('warehouses')->group(function() {
        Route::get('/', [WarehouseController::class, 'index'])->name('warehouses');
        Route::get('/new', [WarehouseController::class, 'new'])->name('warehouses.new');
    });


    Route::prefix('categories')->group(function() {
        Route::get('/', [CategoryController::class, 'index'])->name('categories');
        Route::get('/new', [CategoryController::class, 'new'])->name('categories.new');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    });



    Route::get('/products', [ProductController::class, 'index'])->name('products');

    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');

    Route::get('/providers', [ProviderController::class, 'index'])->name('providers');

    Route::get('/shopping', [ShoppyController::class, 'index'])->name('shopping');

    Route::get('/sales', [SaleController::class, 'index'])->name('sales');
    Route::get('sales/generatePDF/{saleId}', [SaleController::class, 'generatePDF'])->name('generatePDF');
    Route::get('sales/report', [SaleController::class, 'generateReport'])->name('generateReport');
    Route::get('/sales/new', [SaleController::class, 'new'])->name('sale.new');
    Route::get('/products/search/{name}', [SaleController::class, 'searchByName']);
    Route::post('/sales/saved', [SaleController::class, 'saved'])->name('sale.saved');
    Route::get('/sales/filter', [SaleController::class, 'filterSalesByDate'])->name('sales.filterByDate');





    Route::get('/configuration', [ConfigurationController::class, 'index'])->name('configuration');




