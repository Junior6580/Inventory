<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use TCPDF;

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

    public function generateReport()
    {
        $sales = Sale::all();
        $pdf = new TCPDF('P', 'mm', 'UTF-8', true);

        $title = 'Reporte de Ventas - ' . date('Y-m-d h:i:s A');
        $pdf->SetTitle($title);

        $pdf->SetFont('helvetica', '', 10);
        $pdf->AddPage();

        // Customizable colors (replace with your desired hex codes)
        $primaryColor = '#A9CCFF'; // Teal blue
        $secondaryColor = '#ECF0F1'; // Dark gray
        $textColor = '#333'; // Black

        // Table style with borders, colors, and padding
        $tableStyle = 'border-collapse: collapse; width: 100%; margin: auto; text-align: center; padding: 10px; background-color: ' . $secondaryColor . '; color: ' . $textColor . ';';
        $cellStyle = 'border: 1px solid ' . $primaryColor . '; text-align: center; padding: 8px;';
        $headerCellStyle = 'border: 1px solid ' . $primaryColor . '; text-align: center; padding: 8px; font-weight: bold; color: ' . $textColor . '; background-color: ' . $primaryColor . ';';

        // Iterate over each sale
        foreach ($sales as $sale) {
            $html = '<table style="' . $tableStyle . '">';
            $html .= '<tr><th colspan="2" style="' . $headerCellStyle . '"><h3>Factura de Venta</h3></th></tr>';
            $html .= '<tr><td colspan="2" style="' . $cellStyle . '"><strong>Cliente:</strong> ' . $sale->client->person->full_name . '</td></tr>';
            $html .= '<tr><td colspan="2" style="' . $cellStyle . '"><strong>Código:</strong> ' . $sale->voucher_code . '</td></tr>';
            $html .= '<tr><td colspan="2" style="' . $cellStyle . '"><strong>Responsable:</strong> ' . $sale->person->full_name . '</td></tr>';
            $html .= '<tr><td colspan="2" style="' . $cellStyle . '"><strong>Fecha:</strong> ' . $sale->date . '</td></tr>';
            $html .= '<tr><td colspan="2" style="' . $cellStyle . '"><strong>Productos Vendidos:</strong></td></tr>';

            $totalSale = 0; // Initialize total for this sale

            // List of sold products
            foreach ($sale->items as $item) {
                $html .= '<tr>';
                $html .= '<td style="' . $cellStyle . '">' . $item->product->name . '</td>';
                $html .= '<td style="' . $cellStyle . '">Cantidad: ' . $item->quantity . '</td>';
                $html .= '</tr>';

                // Calculate total for each product and add to the total for this sale
                $totalSale += $item->quantity * $item->unit_price;
            }

            // Add total for this sale
            $html .= '<tr><td colspan="2" style="' . $headerCellStyle . '"><strong>Total:</strong> ' . number_format($totalSale, 2) . '</td></tr>';

            $html .= '</table>';

            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->AddPage(); // Add a new page for each sale
        }

        $pdf->Output('reporte_ventas.pdf', 'I');
    }

    public function generatePDF($saleId)
    {
        $sale = Sale::findOrFail($saleId);

        $pdf = new TCPDF('P', 'mm', 'UTF-8', true);

        $title = 'Factura - ' . $sale->date;
        $pdf->SetTitle($title);

        // Customizable colors (replace with your desired hex codes)
        $primaryColor = '#A9CCFF '; // Teal blue
        $secondaryColor = '#ECF0F1 '; // Dark gray
        $textColor = '#333'; // Black

        $pdf->SetFont('helvetica', '', 10);
        $pdf->AddPage();

        $logoPath = public_path('AdminLTE/dist/img/logo.png');
        $logoWidth = 36; // Adjust width as needed
        $logoHeight = 18; // Adjust height as needed
        $pageWidth = $pdf->getPageWidth();
        $pageHeight = $pdf->getPageHeight();

        // Add logo in the upper left corner
        $logoX = 10; // Adjust as needed
        $logoY = 10; // Adjust as needed
        $pdf->Image($logoPath, $logoX, $logoY, $logoWidth, $logoHeight, '', '', '', false, 300, '', false, false, 0);

        // Table style with borders, colors, and padding
        $tableStyle = 'border-collapse: collapse; width: 100%; margin: auto; text-align: center; padding: 10px; background-color: ' . $secondaryColor . '; color: ' . $textColor . ';';
        $cellStyle = 'border: 1px solid ' . $primaryColor . '; text-align: center; padding: 8px;';
        $headerCellStyle = 'border: 1px solid ' . $primaryColor . '; text-align: center; padding: 8px; font-weight: bold; color: ' . $textColor . '; background-color: ' . $primaryColor . ';';

        $html = '<table style="' . $tableStyle . '">';
        $html .= '<tr><th colspan="3" style="' . $headerCellStyle . '"><h3>COMERCIALIZADORA VELAMAR S.A.S HOBO - HUILA <br> NIT: 900775258-3 </h3></th></tr>';
        $html .= '<tr><th colspan="3" style="' . $headerCellStyle . '"><h4>Factura - ' . date('Y-m-d h:i:s A') . '</h4></th></tr>';
        $html .= '<tr><td colspan="3" style="' . $cellStyle . '"><strong>Cliente:</strong> ' . $sale->client->person->full_name . '</td></tr>';
        $html .= '<tr><td colspan="3" style="' . $cellStyle . '"><strong>Código:</strong> ' . $sale->voucher_code . '</td></tr>';
        $html .= '<tr><td colspan="3" style="' . $cellStyle . '"><strong>Vendedor:</strong> ' . $sale->person->full_name . '</td></tr>';
        $html .= '<tr><td colspan="3" style="' . $cellStyle . '">' . $sale->person->document_type . ' ' . $sale->person->document_number . '</td></tr>';
        $html .= '<tr><th style="' . $headerCellStyle . '"><strong>Productos:</strong></th><th style="' . $headerCellStyle . '"><strong>Cantidad:</strong></th><th style="' . $headerCellStyle . '"><strong>Precio Unitario:</strong></th></tr>';

        $total = 0;
        foreach ($sale->items as $item) {
            $html .= '<tr>';
            $html .= '<td style="' . $cellStyle . '">' . $item->product->name . '</td>';
            $html .= '<td style="' . $cellStyle . '">' . $item->quantity . '</td>';
            $html .= '<td style="' . $cellStyle . '">' . number_format($item->unit_price, 2) . '</td>'; // Display unit price
            $html .= '</tr>';
            $total += $item->quantity * $item->unit_price;

            if ($pdf->getY() + 10 > $pageHeight) {
                $pdf->AddPage();
            }
        }

        $html .= '<tr><td colspan="3" style="' . $headerCellStyle . '"><strong>Total:</strong> ' . number_format($total, 2) . '</td></tr>';

        $html .= '</table>';

        $pdf->writeHTML($html, true, false, true, false, '');

        $filename = 'factura_' . $sale->client->person->first_name . '.pdf';
        $pdf->Output($filename, 'I');

    }

    public function new()
    {
        $clients = \App\Models\Client::get();
        $products = Product::get();
        $data = ['title' => 'Nueva Venta', 'clients' => $clients, 'products' => $products];
        return view('sales/new', $data);
    }
    public function searchByName($name)
    {
        $product = Product::where('name', 'like', "%$name%")->first();

        if ($product) {
            return response()->json(['price' => $product->price]);
        } else {
            return response()->json(['price' => null]);
        }
    }

    public function saved(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'voucher_code' => 'required|unique:sales,voucher_code',
            'date' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'product_id' => 'required|array', // Ensure product_id is an array
            'product_id.*' => 'required|exists:products,id', // Validate each product_id
            'quantity' => 'required|array', // Ensure quantity is an array
            'quantity.*' => 'required|numeric|min:1', // Validate each quantity
        ]);

        // Create a new Sale instance and save it
        $sale = new Sale();
        $sale->person_id = $request->person_id;
        $sale->voucher_code = $request->voucher_code;
        $sale->date = $request->date;
        $sale->client_id = $request->client_id;
        $sale->save();

        // Save the sale items (products)
        $products = [];
        for ($i = 0; $i < count($request->product_id); $i++) {
            $product = new SaleItem();
            $product->sale_id = $sale->id; // Associate the product with the sale
            $product->product_id = $request->product_id[$i];
            $product->quantity = $request->quantity[$i];
            // Fetch the unit price of the product and calculate the total price
            $unitPrice = Product::findOrFail($request->product_id[$i])->price;
            $product->unit_price = $unitPrice;
            $product->save();
            $products[] = $product;
        }

        return redirect()->route('sales')->with('success', 'Venta registrada exitosamente');

    }
}

