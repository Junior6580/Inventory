@extends('layouts.master')

@section('content')
<div class="container">
    <div class="col-md-12"><br>
        <div class="card card-primary card-outline shadow">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h2><strong><span>{{ $title }}</span></strong></h2>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                        <a href="{{ route('warehouses.new') }}" wire:navigate class="btn btn-success btn-sm float-end">Nueva
                            Bodega</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th colspan="2" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($warehouses as $warehouse)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $warehouse->name }}</td>
                                <td>{{ $warehouse->description }}</td>
                                <td><a href="#" wire:navigate
                                        class="btn btn-info btn-sm">Editar</a></td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><br>
@endsection
