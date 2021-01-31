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
                            {{trans('cruds.bug.title')}} {{trans('global.reports')}}

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
    </script>

@endsection
