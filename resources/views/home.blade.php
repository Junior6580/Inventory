@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Venta total de productos en {{ \Carbon\Carbon::parse(date('Y').'-'.$selectedMonth.'-01')->format('F Y') }}
                    </h3>
                    <div class="card-tools">
                        <form action="{{ route('home') }}" method="GET">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="month" name="month" class="form-control" value="{{ $selectedMonth }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <canvas id="product-sales-chart" height="300"></canvas>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtener el canvas
        var salesCanvas = document.getElementById('product-sales-chart');

        // Datos para la gráfica
        var productData = {
            labels: {!! json_encode(array_keys($topProductsTotalSales)) !!},
            datasets: [{
                label: 'Venta Total',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: {!! json_encode(array_values($topProductsTotalSales)) !!}
            }]
        };

        // Opciones de la gráfica
        var options = {
            scales: {
                y: {
                    beginAtZero: true,
                    callback: function (value, index, values) {
                        return '$' + value; // Añadir símbolo de dólar al eje y
                    }
                }
            }
        };

        // Crear la gráfica
        var salesChart = new Chart(salesCanvas, {
            type: 'bar',
            data: productData,
            options: options
        });
    });
</script>
@endsection
