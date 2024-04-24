@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-primary card-outline shadow">
                <div class="card-header">
                  <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->

                    <div class="card-body">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 15px;">#</th>
                                    <th>{{ trans('senaempresa::menu.Name') }}</th>
                                    <th>{{ trans('senaempresa::menu.Description') }}</th>
                                    <th>{{ trans('senaempresa::menu.Status') }}</th>
                                    @if (Auth::user()->havePermission('senaempresa.admin.positions.new'))
                                        <th style="width: 100px;">
                                            <a href="{{ route('senaempresa.' . getRoleRouteName(Route::currentRouteName()) . '.positions.new') }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-user-plus"></i></a>
                                        </th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($position_companies as $PositionCompany)
                                    <tr>
                                        <td>{{ $PositionCompany->id }}</td>
                                        <td>{{ $PositionCompany->name }}</td>
                                        <td>{{ $PositionCompany->description }}</td>
                                        <td>{{ $PositionCompany->state }}</td>
                                      
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

        </div>
    </div>
</div>
@endsection
