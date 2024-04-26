@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="text-center"><strong><span>{{ $title }}</span></strong></h1>
        <br>
        <div class="col-md-12">
            <a href="{{ route('generatePDF') }}" class="btn btn-primary">Imprimir Recibo</a>

            <div class="card card-primary card-outline shadow">
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 15px;">#</th>
                                <th>Responsable</th>
                                <th>COD. Vale</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Productos Vendidos</th> <!-- Nuevo encabezado para productos vendidos -->
                                <th>Acciones</th>
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
                                <td> <!-- Aquí se mostrarán los productos vendidos -->
                                    <ul>
                                        @foreach ($sale->items as $item)
                                            <li>{{ $item->product->name }} - Cantidad: {{ $item->quantity }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td></td>
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
