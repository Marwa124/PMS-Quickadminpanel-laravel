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
                            {{trans('cruds.ticket.title')}} {{trans('global.reports')}}

                        </div>
                        <div class="card-body text-center" >
{{--                            <div class="chart-wrapper">--}}
{{--                                @php--}}
{{--                                    $total_spend = 0;--}}
{{--                                @endphp--}}
{{--                                @forelse($projects as $project)--}}
{{--                                    @php--}}
{{--                                        $tasks = $project->tasks;--}}
{{--                                        $timeProject = $project->TimeSheet;--}}
{{--                                                //->where("module_field_id",$project->id);--}}

{{--                                       //$timeTasks = TimeSheet::where('module','task')--}}
{{--                                       //       ->whereIn("module_field_id",$tasks->pluck('id'));--}}
{{--                                    @endphp--}}

{{--                                    --}}{{--get user time spend in project--}}
{{--                                    @forelse($timeProject as $timer)--}}

{{--                                        @if($timer->end_time && $timer->start_time)--}}
{{--                                            @php--}}
{{--                                                $total_spend += ($timer->end_time - $timer->start_time);--}}
{{--                                            @endphp--}}
{{--                                        @endif--}}
{{--                                    @empty--}}
{{--                                    @endforelse--}}

{{--                                    --}}{{--get user time spend in tasks of project --}}

{{--                                    --}}{{--@forelse($timeTasks as $timer)--}}


{{--                                        --}}{{--@if($timer->end_time && $timer->start_time)--}}
{{--                                            --}}{{--@php--}}
{{--                                                --}}{{--$total_spend += ($timer->end_time - $timer->start_time);--}}
{{--                                            --}}{{--@endphp--}}
{{--                                        --}}{{--@endif--}}
{{--                                    --}}{{--@empty--}}
{{--                                    --}}{{--@endforelse--}}

{{--                                    --}}{{--    get_time_spent_result in file global_helper     --}}
{{--                                @empty--}}
{{--                                @endforelse--}}
{{--                                <div  class="align-content-center p-4">--}}

{{--                                    <h1>{{ get_time_spent_result($total_spend)  }}</h1>--}}
{{--                                    <h6 class="align-content-center">{{trans('global.hours')}} : {{trans('global.minutes')}} : {{trans('global.seconds')}}</h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}
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
    </script>

@endsection
