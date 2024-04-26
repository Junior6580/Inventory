<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class SaleController extends Controller
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
    public function index()
    {
        $sales = Sale::get();
        $data = ['title' => 'Ventas', 'sales' => $sales];
        return view('sales/index', $data);
    }

    public function generatePDF()
    {
        $sales = Sale::all();
        // Código para obtener los datos del recibo, similar a como lo haces en tu vista Blade
        $data = [
            'sales' => $sales,
            'title' => 'Ventas' // Suponiendo que $sales contiene los datos que necesitas para el recibo
        ];

        // Renderizar la vista del recibo en HTML
        $html = view('sales/index', $data)->render();

        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Enviar el PDF al navegador para su descarga
        return $dompdf->stream('recibo_compra.pdf');
    }
}
