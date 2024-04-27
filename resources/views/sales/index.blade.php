@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="text-center"><strong><span>{{ $title }}</span></strong></h1>
        <br>
        <div class="col-md-12">
            <div class="card card-primary card-outline shadow">
                <div class="card-body">
                    <a href="{{ route('generateReport') }}" class="btn btn-primary" target="_blank">Generar Reporte</a>
                    <br><br>
                    <table id="inventory" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 15px;">#</th>
                                <th>Responsable</th>
                                <th>Código</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Productos Vendidos</th>
                                <th>Factura</th>
                                <th>  <a href="{{ route('sale.new') }}" class="btn btn-success"><i class="fas fa-cart-plus"></i></a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->person->full_name }}</td>
                                    <td>{{ $sale->voucher_code }}</td>
                                    <td>{{ $sale->date }}</td>
                                    <td>{{ $sale->client->person->full_name }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($sale->items as $item)
                                                <li>{{ $item->product->name }} - Cantidad: {{ $item->quantity }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{ route('generatePDF', $sale->id) }}" class="btn btn-info" target="_blank"><i class="fas fa-receipt"></i></a>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
