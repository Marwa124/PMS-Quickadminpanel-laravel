@extends('layouts.admin')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('projectmanagement.name') !!}
    </p>
    <!-- Main content -->
    <main class="main">
        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="card-columns cols-2">

                    <div class="card">
                        <div class="card-header">
                            Pie Chart
                            <div class="card-actions">
                                <a href="http://www.chartjs.org">
                                    <small class="text-muted">docs</small>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <canvas id="canvas-5"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.conainer-fluid -->
    </main>
@endsection

@section('scripts')

    <!-- Plugins and scripts required by all views -->
    <script src="{{asset('js/Chart.min.js')}}"></script>
    {{--<script src="vendors/js/Chart.min.js"></script>--}}

    <!-- Custom scripts required by this view -->
    {{--<script src="{{asset('js/charts.js')}}"></script>--}}

    <script>
        var pieData = {
            labels: [
                'Red',
                'blue',
                'Green',
                'Yellow'
            ],
            datasets: [{
                data: [300, 250, 100,100],
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#9937EB',
                    '#FFCE56'
                ],
                hoverBackgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#9937EB',
                    '#FFCE56'
                ]
            }]
        };
        var ctx = document.getElementById('canvas-5');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: pieData,
            options: {
                responsive: true
            }
        });
    </script>

@endsection
