@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"><br>
            <div class="card card-primary card-outline shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h2><strong><span>{{ $title }}</span></strong></h2>
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <a href="{{ route('categories.new') }}" wire:navigate class="btn btn-success btn-sm float-end">Nueva Categoria</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="inventory" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}" wire:navigate class="btn btn-info btn-sm">Editar</a>
                                        <form action="{{ route('categories.delete', $category->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres borrar esto?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
