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
                                <th>COD. Factura</th>
                                <th>Fecha</th>
                                <th>Evidencia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shoppies as $shoppy)
                                <tr>
                                    <td>{{ $shoppy->id }}</td>
                                    <td>{{ $shoppy->person->full_name }}</td>
                                    <td>{{ $shoppy->INVOICE_CODE }}</td>
                                    <td>{{ $shoppy->date }}</td>
                                    <td>{{ $shoppy->image }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>   <br>
@endsection
