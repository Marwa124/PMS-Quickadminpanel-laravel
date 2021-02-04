@extends('layouts.admin')

@section('content')

    <!-- Main content -->
    <main class="main">
        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="card-columns cols-2">

                    <div class="card">
                        <div class="card-header">
                            {{trans('cruds.ticket.title')}} {{trans('global.reports')}}
                            <input type="hidden" id="opened_count"      value="{{$tickets->where('status','opened')->count()}}"/>
                            <input type="hidden" id="answered_count"    value="{{$tickets->where('status','answered')->count()}}"/>
                            <input type="hidden" id="in_progress_count" value="{{$tickets->where('status','in_progress')->count()}}"/>
                            <input type="hidden" id="closed_count"      value="{{$tickets->where('status','closed')->count()}}"/>
                            <input type="hidden" id="reopen_count"      value="{{$tickets->where('status','reopen')->count()}}"/>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <canvas id="canvas-5"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            {{trans('cruds.ticket.title')}} {{trans('global.reports')}} {{ date('Y')}}

                        </div>

                        <input type="hidden" id="openedArray"       value="{{$openedArray}}"/>
                        <input type="hidden" id="answeredArray"     value="{{$answeredArray}}"/>
                        <input type="hidden" id="in_progressArray"  value="{{$in_progressArray}}"/>
                        <input type="hidden" id="closedArray"       value="{{$closedArray}}"/>
                        <input type="hidden" id="reopenArray"       value="{{$reopenArray}}"/>

                        <div class="card-body" >
                            <div class="chart-wrapper">
                                <canvas id="canvas-1"></canvas>
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


    <script>
        var opened_count        = document.getElementById("opened_count").value;
        var answered_count      = document.getElementById("answered_count").value;
        var in_progress_count   = document.getElementById("in_progress_count").value;
        var closed_count        = document.getElementById("closed_count").value;
        var reopen_count        = document.getElementById("reopen_count").value;

        var pieData = {
            labels: [
                '{{trans('cruds.status.open')}}',
                '{{trans('cruds.status.answered')}}',
                '{{trans('cruds.status.in_progress')}}',
                '{{trans('cruds.status.close')}}',
                '{{trans('cruds.status.reopen')}}',
            ],
            datasets: [{
                data: [opened_count,answered_count,in_progress_count,closed_count,reopen_count],
                backgroundColor: [
                    '#0d86ff',
                    '#1c7430',
                    '#FFCE56',
                    '#000000',
                    '#94171c',
                ],
                hoverBackgroundColor: [
                    '#0d86ff',
                    '#1c7430',
                    '#FFCE56',
                    '#000000',
                    '#94171c',
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

        var opened      = document.getElementById("openedArray").value;
        var answered    = document.getElementById("answeredArray").value;
        var in_progress = document.getElementById("in_progressArray").value;
        var close       = document.getElementById("closedArray").value;
        var reopen      = document.getElementById("reopenArray").value;

        //convert objects to array
        var openedArray      = convert_object_to_array(opened);
        var answeredArray    = convert_object_to_array(answered);
        var in_progressArray = convert_object_to_array(in_progress);
        var closedArray      = convert_object_to_array(close);
        var reopenArray      = convert_object_to_array(reopen);


        var lineChartData = {

            labels : ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets : [
                {
                    label: '{{trans('cruds.status.open')}}',
                    backgroundColor : 'rgba(220,220,220,0)',
                    borderColor : 'rgb(13,134,255)',
                    pointBackgroundColor : 'rgba(220,220,220,1)',
                    pointBorderColor : '#0d86ff',
                    data : [
                        openedArray.shift() ,
                        openedArray.shift() ,
                        openedArray.shift() ,
                        openedArray.shift() ,
                        openedArray.shift() ,
                        openedArray.shift() ,
                        openedArray.shift() ,
                        openedArray.shift() ,
                        openedArray.shift() ,
                        openedArray.shift() ,
                        openedArray.shift() ,
                        openedArray.shift() ,

                    ],
                },
                {
                    label:'{{trans('cruds.status.answered')}}',
                    backgroundColor : 'rgba(220,220,220,0)',
                    borderColor : 'rgb(28,116,48)',
                    pointBackgroundColor : 'rgba(220,220,220,1)',
                    pointBorderColor : '#1c7430',
                    data : [
                        answeredArray.shift() ,
                        answeredArray.shift() ,
                        answeredArray.shift() ,
                        answeredArray.shift() ,
                        answeredArray.shift() ,
                        answeredArray.shift() ,
                        answeredArray.shift() ,
                        answeredArray.shift() ,
                        answeredArray.shift() ,
                        answeredArray.shift() ,
                        answeredArray.shift() ,
                        answeredArray.shift() ,
                    ],
                },
                {
                    label: '{{trans('cruds.status.in_progress')}}',
                    backgroundColor : 'rgba(220,220,220,0)',
                    borderColor : 'rgb(255,206,86)',
                    pointBackgroundColor : 'rgba(220,220,220,1)',
                    pointBorderColor : '#FFCE56',
                    data : [
                        in_progressArray.shift() ,
                        in_progressArray.shift() ,
                        in_progressArray.shift() ,
                        in_progressArray.shift() ,
                        in_progressArray.shift() ,
                        in_progressArray.shift() ,
                        in_progressArray.shift() ,
                        in_progressArray.shift() ,
                        in_progressArray.shift() ,
                        in_progressArray.shift() ,
                        in_progressArray.shift() ,
                        in_progressArray.shift() ,
                    ],
                },
                {
                    label: '{{trans('cruds.status.close')}}',
                    backgroundColor : 'rgba(220,220,220,0)',
                    borderColor : 'rgb(0,0,0)',
                    pointBackgroundColor : 'rgba(220,220,220,1)',
                    pointBorderColor : '#000000',
                    data : [
                        closedArray.shift(),
                        closedArray.shift(),
                        closedArray.shift(),
                        closedArray.shift(),
                        closedArray.shift(),
                        closedArray.shift(),
                        closedArray.shift(),
                        closedArray.shift(),
                        closedArray.shift(),
                        closedArray.shift(),
                        closedArray.shift(),
                        closedArray.shift(),
                    ],
                },
                {
                    label:  '{{trans('cruds.status.reopen')}}',
                    backgroundColor : 'rgba(220,220,220,0)',
                    borderColor : 'rgb(147,23,28)',
                    pointBackgroundColor : 'rgba(220,220,220,1)',
                    pointBorderColor : '#94171c',
                    data : [
                        reopenArray.shift(),
                        reopenArray.shift(),
                        reopenArray.shift(),
                        reopenArray.shift(),
                        reopenArray.shift(),
                        reopenArray.shift(),
                        reopenArray.shift(),
                        reopenArray.shift(),
                        reopenArray.shift(),
                        reopenArray.shift(),
                        reopenArray.shift(),
                        reopenArray.shift(),
                    ],
                }
            ]
        }

        var ctx = document.getElementById('canvas-1');
        var chart = new Chart(ctx, {
            type: 'line',
            data: lineChartData,
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 2
                        }
                    }]
                },
            }
        });

        function convert_object_to_array ( status)
        {
            status   = status.split(',');
            var statusArray  = [];

            for (var i = 0;i<status.length;i++){

                statusArray[i] = status[i]
            }

            return statusArray;
        }
    </script>

@endsection
