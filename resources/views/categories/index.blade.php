@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center"> <!-- Added row and justify-content-center -->
            <h1 class="text-center"><strong><span>{{ $title }}</span></strong></h1>
        </div>
        <br>
        <div class="row justify-content-center"> <!-- Added row and justify-content-center -->
            <div class="col-md-8">
                <div class="card card-primary card-outline shadow">
                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 15px;">#</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
