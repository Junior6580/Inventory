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
                                <th>COD. Vale</th>
                                <th>Cliente</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->person_id }}</td>
                                    <td>{{ $sale->voucher_code }}</td>
                                    <td>{{ $sale->employee_id }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
