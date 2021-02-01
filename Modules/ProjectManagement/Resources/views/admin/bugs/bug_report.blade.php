@extends('layouts.admin')

@section('content')

    <!-- Main content -->
    <main class="main">
        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="card-columns cols-2">

                    <div class="card">
                        <div class="card-header">
                            {{trans('cruds.bug.title')}} {{trans('global.reports')}}
                            <input type="hidden" id="unconfirm_count"   value="{{$bugs->where('status','unconfirm')->count()}}"/>
                            <input type="hidden" id="confirmed_count"   value="{{$bugs->where('status','confirmed')->count()}}"/>
                            <input type="hidden" id="in_progress_count" value="{{$bugs->where('status','in_progress')->count()}}"/>
                            <input type="hidden" id="resolved_count"    value="{{$bugs->where('status','resolved')->count()}}"/>
                            <input type="hidden" id="verified_count"    value="{{$bugs->where('status','verified')->count()}}"/>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <canvas id="canvas-5"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            {{trans('cruds.bug.title')}} {{trans('global.reports')}} {{ date('Y')}}

                        </div>

                        <input type="hidden" id="unconfirmArray"    value="{{$unconfirmArray}}"/>
                        <input type="hidden" id="confirmedArray"    value="{{$confirmedArray}}"/>
                        <input type="hidden" id="in_progressArray"  value="{{$in_progressArray}}"/>
                        <input type="hidden" id="resolvedArray"     value="{{$resolvedArray}}"/>
                        <input type="hidden" id="verifiedArray"     value="{{$verifiedArray}}"/>

                        <div class="card-body">
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
        var unconfirm_count     = document.getElementById("unconfirm_count").value;
        var confirmed_count     = document.getElementById("confirmed_count").value;
        var in_progress_count   = document.getElementById("in_progress_count").value;
        var resolved_count      = document.getElementById("resolved_count").value;
        var verified_count      = document.getElementById("verified_count").value;

        var pieData = {
            labels: [
                '{{trans('cruds.status.unconfirm')}}',
                '{{trans('cruds.status.confirmed')}}',
                '{{trans('cruds.status.in_progress')}}',
                '{{trans('cruds.status.resolved')}}',
                '{{trans('cruds.status.verified')}}',
            ],
            datasets: [{
                data: [unconfirm_count,confirmed_count,in_progress_count,resolved_count,verified_count],
                backgroundColor: [
                    '#94171c',
                    '#0d86ff',
                    '#FFCE56',
                    '#000fff',
                    '#1c7430',
                    // '#4c110f',
                ],
                hoverBackgroundColor: [
                    '#94171c',
                    '#0d86ff',
                    '#FFCE56',
                    '#000fff',
                    '#1c7430',
                    // '#4c110f',
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

        var unconfirm      = document.getElementById("unconfirmArray").value;
        var confirmed      = document.getElementById("confirmedArray").value;
        var in_progress    = document.getElementById("in_progressArray").value;
        var resolved       = document.getElementById("resolvedArray").value;
        var verified       = document.getElementById("verifiedArray").value;

        //convert objects to array

        var unconfirmArray      = convert_object_to_array(unconfirm);
        var confirmedArray      = convert_object_to_array(confirmed);
        var in_progressArray    = convert_object_to_array(in_progress);
        var resolvedArray       = convert_object_to_array(resolved);
        var verifiedArray       = convert_object_to_array(verified);


        var lineChartData = {

            labels : ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets : [
                {
                    label: '{{trans('cruds.status.unconfirm')}}',
                    backgroundColor : 'rgba(220,220,220,0)',
                    borderColor : 'rgb(147,23,28)',
                    pointBackgroundColor : 'rgba(220,220,220,1)',
                    pointBorderColor : '#94171c',
                    data : [
                        unconfirmArray.shift() ,
                        unconfirmArray.shift() ,
                        unconfirmArray.shift() ,
                        unconfirmArray.shift() ,
                        unconfirmArray.shift() ,
                        unconfirmArray.shift() ,
                        unconfirmArray.shift() ,
                        unconfirmArray.shift() ,
                        unconfirmArray.shift() ,
                        unconfirmArray.shift() ,
                        unconfirmArray.shift() ,
                        unconfirmArray.shift() ,

                    ],
                },
                {
                    label:'{{trans('cruds.status.confirmed')}}',
                    backgroundColor : 'rgba(220,220,220,0)',
                    borderColor : 'rgb(13,134,255)',
                    pointBackgroundColor : 'rgba(220,220,220,1)',
                    pointBorderColor : '#0d86ff',
                    data : [
                        confirmedArray.shift() ,
                        confirmedArray.shift() ,
                        confirmedArray.shift() ,
                        confirmedArray.shift() ,
                        confirmedArray.shift() ,
                        confirmedArray.shift() ,
                        confirmedArray.shift() ,
                        confirmedArray.shift() ,
                        confirmedArray.shift() ,
                        confirmedArray.shift() ,
                        confirmedArray.shift() ,
                        confirmedArray.shift() ,
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
                    label: '{{trans('cruds.status.resolved')}}',
                    backgroundColor : 'rgba(220,220,220,0)',
                    borderColor : 'rgb(0,15,255)',
                    pointBackgroundColor : 'rgba(220,220,220,1)',
                    pointBorderColor : '#000fff',
                    data : [
                        resolvedArray.shift(),
                        resolvedArray.shift(),
                        resolvedArray.shift(),
                        resolvedArray.shift(),
                        resolvedArray.shift(),
                        resolvedArray.shift(),
                        resolvedArray.shift(),
                        resolvedArray.shift(),
                        resolvedArray.shift(),
                        resolvedArray.shift(),
                        resolvedArray.shift(),
                        resolvedArray.shift(),
                    ],
                },
                {
                    label:  '{{trans('cruds.status.verified')}}',
                    backgroundColor : 'rgba(220,220,220,0)',
                    borderColor : 'rgb(28,116,48)',
                    pointBackgroundColor : 'rgba(220,220,220,1)',
                    pointBorderColor : '#1c7430',
                    data : [
                        verifiedArray.shift(),
                        verifiedArray.shift(),
                        verifiedArray.shift(),
                        verifiedArray.shift(),
                        verifiedArray.shift(),
                        verifiedArray.shift(),
                        verifiedArray.shift(),
                        verifiedArray.shift(),
                        verifiedArray.shift(),
                        verifiedArray.shift(),
                        verifiedArray.shift(),
                        verifiedArray.shift(),
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
