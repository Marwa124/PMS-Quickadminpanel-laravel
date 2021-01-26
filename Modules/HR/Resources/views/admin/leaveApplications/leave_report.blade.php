@extends('layouts.admin')
@section('content')

<main class="main">
    <div class="container-fluid">

        <div class="animated fadeIn">
            <div class="card-columns cols-2">

                <div class="card">
                    <div class="card-header">
                        {{trans('cruds.project.title')}} {{trans('global.reports')}}
                    {{-- {{dd($leaves)}} --}}
                        <input type="hidden" id="annual" value="{{$annual['token_leaves']}}"/>
                        <input type="hidden" id="emergency" value="{{$emergency['token_leaves']}}"/>
                        <input type="hidden" id="sick" value="{{$sick['token_leaves']}}"/>
                        <input type="hidden" id="home" value="{{$home['token_leaves']}}"/>
                        <input type="hidden" id="clockLate" value="{{$clockLate['token_leaves']}}"/>
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
@parent
 <script src="{{asset('js/Chart.min.js')}}"></script>
<script>
    $(function () {


        var annual     = document.getElementById("annual").value;
        var emergency  = document.getElementById("emergency").value;
        var sick       = document.getElementById("sick").value;
        var home       = document.getElementById("home").value;
        var clockLate  = document.getElementById("clockLate").value;
        var pieData = {
            labels: [
                '{{trans('cruds.status.started')}}',
                '{{trans('cruds.status.in_progress')}}',
                '{{trans('cruds.status.on_hold')}}',
                '{{trans('cruds.status.cancel')}}',
                '{{trans('cruds.status.completed')}}',
                '{{trans('cruds.status.overdue')}}',
            ],
            datasets: [{
                data: [annual,emergency,sick,home,clockLate],
                backgroundColor: [
                    '#0d86ff',
                    '#FFCE56',
                    '#000000',
                    '#94171c',
                    '#1c7430',
                ],
                hoverBackgroundColor: [
                    '#0d86ff',
                    '#FFCE56',
                    '#000000',
                    '#94171c',
                    '#1c7430',
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
    })

</script>

@endsection