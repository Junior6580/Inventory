@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="text-center"><strong><span>{{ $title }}</span></strong></h1>
        <br>
        <div class="col-md-12">
            <div class="card card-primary card-outline shadow">
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 15px;">#</th>
                                <th>Empresa</th>
                                <th>Encargado</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Direción</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($providers as $provider)
                                <tr>
                                    <td>{{ $provider->id }}</td>
                                    <td>{{ $provider->company }}</td>
                                    <td>{{ $provider->person->full_name }}</td>
                                    <td>{{ $provider->person->email }}</td>
                                    <td>{{ $provider->person->telephone1 }}</td>
                                    <td>{{ $provider->person->address }}</td>
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
