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
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($warehouses as $warehouse)
                                <tr>
                                    <td>{{ $warehouse->id }}</td>
                                    <td>{{ $warehouse->name }}</td>
                                    <td>{{ $warehouse->description }}</td>
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
