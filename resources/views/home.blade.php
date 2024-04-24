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
                        Ventas
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                            </li>
                        </ul>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart"
                             style="position: relative; height: 300px;">
                            <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                        </div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                            <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<script>
    // Script for drawing charts
    document.addEventListener('DOMContentLoaded', function () {
        // Data for the charts
        var revenueData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Revenue',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: [10000, 20000, 15000, 25000, 18000, 22000, 30000]
            }]
        };

        var salesData = {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Sales',
                backgroundColor: ['red', 'blue', 'yellow', 'green', 'purple', 'orange'],
                borderColor: 'white',
                data: [12, 19, 3, 5, 2, 3]
            }]
        };

        // Options for the charts
        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        // Get the canvas elements
        var revenueCanvas = document.getElementById('revenue-chart-canvas');
        var salesCanvas = document.getElementById('sales-chart-canvas');

        // Create the charts
        var revenueChart = new Chart(revenueCanvas, {
            type: 'line',
            data: revenueData,
            options: options
        });

        var salesChart = new Chart(salesCanvas, {
            type: 'doughnut',
            data: salesData,
            options: options
        });
    });
</script>
@endsection
