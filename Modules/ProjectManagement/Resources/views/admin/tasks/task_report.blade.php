@extends('layouts.admin')

@section('content')

    <!-- Main content -->
    <main class="main">
        <div class="container-fluid">

            <div class="animated fadeIn">
                <div class="card-columns cols-2">

                    <div class="card">
                        <div class="card-header">
                            {{trans('cruds.task.title')}} {{trans('global.reports')}}
                            {{--<div class="card-actions">--}}
                                {{--<a href="http://www.chartjs.org">--}}
                                    {{--<small class="text-muted">docs</small>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                            {{--@dd($projects)--}}
                            <input type="hidden" id="not_started_count"     value="{{$tasks->where('status','Not Started')->count()}}"/>
                            <input type="hidden" id="in_progress_count"     value="{{$tasks->where('status','In Progress')->count()}}"/>
                            <input type="hidden" id="completed_count"       value="{{$tasks->where('status','Completed')->count()}}"/>
                            <input type="hidden" id="deffered_count"        value="{{$tasks->where('status','Deffered')->count()}}"/>
                            <input type="hidden" id="waiting_someone_count" value="{{$tasks->where('status','Waiting For Someone')->count()}}"/>
                        </div>
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <canvas id="canvas-5"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            {{trans('cruds.task.fields.total_projects_time_spent')}}

                        </div>
                        <div class="card-body text-center">
                            <div class="chart-wrapper">
                                @php
                                    $total_spend = 0;
                                @endphp
                                @forelse($tasks as $task)
                                    @php
                                        $timeTask = $task->TimeSheet;
                                                //->where("module_field_id",$project->id);

                                       //$timeTasks = TimeSheet::where('module','task')
                                       //       ->whereIn("module_field_id",$tasks->pluck('id'));
                                    @endphp

                                    {{--get user time spend in project--}}
                                    @forelse($timeTask as $timer)

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
    {{--<script src="vendors/js/Chart.min.js"></script>--}}

    <!-- Custom scripts required by this view -->
    {{--<script src="{{asset('js/charts.js')}}"></script>--}}

    <script>
        var not_started_count       = document.getElementById("not_started_count").value;
        var in_progress_count   = document.getElementById("in_progress_count").value;
        var completed_count       = document.getElementById("completed_count").value;
        var deffered_count        = document.getElementById("deffered_count").value;
        var waiting_someone_count   = document.getElementById("waiting_someone_count").value;
        var pieData = {
            labels: [
                '{{trans('cruds.status.not_started')}}',
                '{{trans('cruds.status.in_progress')}}',
                '{{trans('cruds.status.completed')}}',
                '{{trans('cruds.status.deffered')}}',
                '{{trans('cruds.status.waiting_someone')}}',
            ],
            datasets: [{
                data: [not_started_count,in_progress_count,completed_count,deffered_count,waiting_someone_count],
                backgroundColor: [
                    '#0d86ff',
                    '#FFCE56',
                    '#1c7430',
                    '#94171c',
                    '#000000',
                ],
                hoverBackgroundColor: [
                    '#0d86ff',
                    '#FFCE56',
                    '#1c7430',
                    '#94171c',
                    '#000000',
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
