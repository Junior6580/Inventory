@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="text-center"><strong><span>{{ $title }}</span></strong>
        </h1>
        <br>
        <div class="col-md-12">
            <div class="card card-primary card-outline shadow">
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 15px;">#</th>
                                <th>Responsable</th>
                                <th>Bodega</th>
                                <th>Producto</th>
                                <th>Existencias</th>
                                <th>Fecha de expiración</th>
                                <th>Esatdo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventories as $inventory)
                                <tr>
                                    <td>{{ $inventory->id }}</td>
                                    <td>{{ $inventory->person->full_name }}</td>
                                    <td>{{ $inventory->warehouse->name }}</td>
                                    <td>{{ $inventory->product->name }}</td>
                                    <td>{{ $inventory->stock }}</td>
                                    <td>{{ $inventory->expiration_date }}</td>
                                    <td>{{ $inventory->state }}</td>
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
