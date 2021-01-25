@extends('layouts.admin')

@section('content')

    <!-- Main content -->
    <main class="main">
        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="card-columns cols-2">

                    <div class="card">
                        <div class="card-header">
                            {{trans('cruds.project.title')}} {{trans('global.reports')}}
                            {{--<div class="card-actions">--}}
                                {{--<a href="http://www.chartjs.org">--}}
                                    {{--<small class="text-muted">docs</small>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--@dd($projects)--}}
                            <input type="hidden" id="started_count" value="{{$projects->where('project_status','started')->count()}}"/>
                            <input type="hidden" id="in_progress_count" value="{{$projects->where('project_status','in_progress')->count()}}"/>
                            <input type="hidden" id="on_hold_count" value="{{$projects->where('project_status','on_hold')->count()}}"/>
                            <input type="hidden" id="cancel_count" value="{{$projects->where('project_status','cancel')->count()}}"/>
                            <input type="hidden" id="completed_count" value="{{$projects->where('project_status','completed')->count()}}"/>
                            <input type="hidden" id="overdue_count" value="{{$projects->where('project_status','overdue')->count()}}"/>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <canvas id="canvas-5"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            {{trans('cruds.project.fields.total_projects_time_spent')}}

                        </div>
                        <div class="card-body text-center">
                            <div class="chart-wrapper">
                                @php
                                    $total_spend = 0;
                                @endphp
                                @forelse($projects as $project)
                                    @php
                                        $tasks = $project->tasks;
                                        $timeProject = $project->TimeSheet;
                                                //->where("module_field_id",$project->id);

                                       //$timeTasks = TimeSheet::where('module','task')
                                       //       ->whereIn("module_field_id",$tasks->pluck('id'));
                                    @endphp

                                    {{--get user time spend in project--}}
                                    @forelse($timeProject as $timer)

                                        @if($timer->end_time && $timer->start_time)
                                            @php
                                                $total_spend += ($timer->end_time - $timer->start_time);
                                            @endphp
                                        @endif
                                    @empty
                                    @endforelse

                                    {{--get user time spend in tasks of project --}}

                                    {{--@forelse($timeTasks as $timer)--}}


                                        {{--@if($timer->end_time && $timer->start_time)--}}
                                            {{--@php--}}
                                                {{--$total_spend += ($timer->end_time - $timer->start_time);--}}
                                            {{--@endphp--}}
                                        {{--@endif--}}
                                    {{--@empty--}}
                                    {{--@endforelse--}}

                                    {{--    get_time_spent_result in file global_helper     --}}
                                @empty
                                @endforelse
                                <div  class="align-content-center p-4">

                                    <h1>{{ get_time_spent_result($total_spend)  }}</h1>
                                    <h6 class="align-content-center">{{trans('global.hours')}} : {{trans('global.minutes')}} : {{trans('global.seconds')}}</h6>
                                </div>
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
        var started_count       = document.getElementById("started_count").value;
        var in_progress_count   = document.getElementById("in_progress_count").value;
        var on_hold_count       = document.getElementById("on_hold_count").value;
        var cancel_count        = document.getElementById("cancel_count").value;
        var completed_count     = document.getElementById("completed_count").value;
        var overdue_count       = document.getElementById("overdue_count").value;

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
                data: [started_count,in_progress_count,on_hold_count,cancel_count,completed_count,overdue_count],
                backgroundColor: [
                    '#0d86ff',
                    '#FFCE56',
                    '#000000',
                    '#94171c',
                    '#1c7430',
                    '#4c110f',
                ],
                hoverBackgroundColor: [
                    '#0d86ff',
                    '#FFCE56',
                    '#000000',
                    '#94171c',
                    '#1c7430',
                    '#4c110f',
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
