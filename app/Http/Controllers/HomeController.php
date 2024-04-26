<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // Obtener el mes seleccionado o el mes actual si no se especifica
        $selectedMonth = $request->input('month', Carbon::now()->format('m'));

        // Obtener ventas del mes seleccionado
        $sales = Sale::whereMonth('date', $selectedMonth)->get();

        // Obtener todos los productos
        $products = Product::all();

        // Inicializar el array de ventas totales para cada producto
        $productSalesTotal = [];

       // Calcular la venta total de cada producto en el mes seleccionado
foreach ($products as $product) {
    $totalSale = $sales->flatMap(function ($sale) use ($product) {
        // Check if $sale->items is not null before calling where() method
        if ($sale->items) {
            return $sale->items->where('product_id', $product->id)->sum(function ($item) {
                return $item->quantity * $item->unit_price;
            });
        } else {
            return 0; // Return 0 if $sale->items is null
        }
    })->sum();

    $productSalesTotal[$product->name] = $totalSale;
}


        // Ordenar los productos por venta total y tomar los 10 primeros
        arsort($productSalesTotal);
        $topProductsTotalSales = array_slice($productSalesTotal, 0, 10, true);

        return view('home', compact('topProductsTotalSales', 'selectedMonth'));
    }
}
