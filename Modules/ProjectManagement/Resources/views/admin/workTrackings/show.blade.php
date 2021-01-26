@extends('layouts.admin')

@section('styles')
    <style>

        .progress {
            width: 250px;
            height: 250px;
            background: none;
            position: relative;
        }

        .progress::after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 10px solid #eee;
            position: absolute;
            top: 0;
            left: 0;
        }

        .progress > span {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 1;
        }

        .progress .progress-left {
            left: 0;
        }

        .progress .progress-bar {
            width: 100%;
            height: 100%;
            background: none;
            border-width: 6px;
            border-style: solid;
            position: absolute;
            top: 0;
        }

        .progress .progress-left .progress-bar {
            left: 100%;
            border-top-right-radius: 150px;
            border-bottom-right-radius: 150px;
            border-left: 0;
            -webkit-transform-origin: center left;
            transform-origin: center left;
        }

        .progress .progress-right {
            right: 0;
        }

        .progress .progress-right .progress-bar {
            left: -100%;
            border-top-left-radius: 150px;
            border-bottom-left-radius: 150px;
            border-right: 0;
            -webkit-transform-origin: center right;
            transform-origin: center right;
        }

        .progress .progress-value {
            position: absolute;
            top: 0;
            left: 0;
        }


    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card">

                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-details-tab" data-toggle="pill" href="#v-pills-details"
                       role="tab" aria-controls="v-pills-details"
                       aria-selected="true">{{ trans('cruds.workTracking.title') }} {{trans('global.details')}}</a>
                    {{--<a class="nav-link" id="v-pills-tasks-tab" data-toggle="pill" href="#v-pills-tasks" role="tab" aria-controls="v-pills-tasks" aria-selected="false"> {{ trans('cruds.task.title') }}<span class="float-right">{{$workTracking->tasks->count() > 0 ? $workTracking->tasks->count() : ''}}</span></a>--}}
                    <a class="nav-link" id="v-pills-activities-tab"     data-toggle="pill" href="#v-pills-activities" role="tab" aria-controls="v-pills-activities" aria-selected="false">{{ trans('cruds.activities.title') }}<span class="float-right">{{$workTracking->activities()->count() > 0 ? $workTracking->activities()->count() : ''}}</span></a>
                    {{--                    <a class="nav-link" id="v-pills-comments-tab" data-toggle="pill" href="#v-pills-comments" role="tab" aria-controls="v-pills-comments" aria-selected="false">Comments</a>--}}
                </div>
            </div>
        </div>
        <div class="col-9">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-details" role="tabpanel"
                     aria-labelledby="v-pills-details-tab">

                    <div class="card">
                        <h5 class="card-header">{{ $workTracking->subject }}
                            @can('work_tracking_edit')
                                <a class="float-right small"
                                   href="{{ route('projectmanagement.admin.work-trackings.edit', $workTracking->id) }}">
                                    {{ trans('global.edit') }}  {{ trans('cruds.workTracking.title_singular') }}
                                </a>
                            @endcan
                        </h5>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="col-sm-6 border-right ">

                                    <div class="pl-1 ">
                                        <div class="row">
                                            <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.subject') }}
                                                :</p> <span class="col-md-6">{{ $workTracking->subject ?? '' }}</span>
                                        </div>
                                        <div class="row">
                                            <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.work_type') }}
                                                : </p><span class="col-md-6">{{ $workTracking->work_type ? $workTracking->work_type->name : '' }}</span>
                                        </div>
                                        <div class="row">
                                            <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.start_date') }}
                                                :</p> <span class="col-md-6">{{ $workTracking->start_date ?? '' }}</span></div>
                                        <div class="row">
                                            <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.end_date') }}
                                                :</p> <span class="col-md-6">{{ $workTracking->end_date ?? '' }}</span>
                                        </div>
                                        <div class="row" style="color:{{$color}}">

                                                <p class="font-bold col-md-6 " ><b>{{ trans('cruds.task.fields.status') }} :</b> </p>
                                                <span class="col-md-6 bold" ><b>{{ $workTrakingStatus ?? '' }}</b></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 ">

                                    <div class="pl-1 ">
                                        <div class="row"><p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.description') }}
                                                : </p><span class="col-md-6">{{ $workTracking->description ?? '' }}</span></div>
                                        {{--                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.notify_work_achive') }} :</p> <span class="col-md-6">{{ $workTracking->notify_work_achive ? $workTracking->notify_work_achive : 'off' }}</span> </div>--}}
                                        {{--                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.notify_work_not_achive') }}  : </p><span class="col-md-6">{{ $workTracking->notify_work_not_achive ? $workTracking->notify_work_not_achive : 'off' }}</span> </div>--}}
                                        {{--                                        <div class="row"> <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.email_send') }}  : </p><span class="col-md-6">{{ $workTracking->email_send ?? '' }}</span> </div>--}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 pt-4 mb-4 text-center">
                                <h5 class=" font-weight-bold text-center mb-4">{{ trans('cruds.workTracking.fields.completed_achievement') }} : {{$result['achievement_WorkTracking']}}</h5>
                                <h6 class=" font-weight-bold text-center mb-4">{{ trans('cruds.workTracking.fields.target_achievement') }} : {{$workTracking->achievement ?? ''}} </h6>

                                <!-- Progress bar 1 -->
                                {{--<div class="progress mx-auto" data-value='{{$result['progress_WorkTracking']}}'>--}}
                                    {{--<span class="progress-left">--}}
                                        {{--<span class="progress-bar border-success"></span>--}}
                                    {{--</span>--}}
                                    {{--<span class="progress-right">--}}
                                            {{--<span class="progress-bar border-success"></span>--}}
                                    {{--</span>--}}
                                    {{--<div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">--}}
                                        {{--<div class="h2 font-weight-bold"> {{$result['progress_WorkTracking']}} %</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <!-- END -->

                                {{--<div class="card">--}}
                                   {{----}}
                                    {{--<div class="card-body">--}}
                                        <input type="hidden" id="progress_WorkTracking" value="{{$result['progress_WorkTracking']}}"/>
                                        <div class="chart-wrapper">
                                            <canvas id="canvas-3" height="70"></canvas>
                                            <h2>{{$result['progress_WorkTracking']}} %</h2>
                                        </div>
{{--                                @dd($result)--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-activities" role="tabpanel" aria-labelledby="v-pills-activities-tab">
                    <div class="card">
                        <h5 class="card-header">
                                {{ trans('cruds.activities.title') }}
                        </h5>

                        <div class="tab-pane fade show active" id="v-pills-activity" role="tabpanel" aria-labelledby="v-pills-activity-tab">
                        @if($workTracking->activities()->count() > 0)
                            <div class="card-body">

                                <div class="item">
                                    <div id="timeline">
                                        <div>
                                            @forelse($workTracking->activities as $activity)
                                                <section class="year">
                                                    {{--                                                   time_ago in file global_helper --}}
                                                    <section>
                                                        <ul>
                                                            <small title="{{$activity->activity_date ?? ''}}">{{time_ago($activity->activity_date ?? '')}}</small>
                                                            <li><a href="{{route('admin.users.show',$activity->user->id)}}">{{$activity->user->name ?? ''}}</a> {{$activity->activity ?? ''}} <strong> {{$activity->value1 ?? ''}} </strong></li>
                                                        </ul>
                                                    </section>
                                                </section>
                                            @empty
                                            @endforelse

                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endif
                    </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-comments" role="tabpanel" aria-labelledby="v-pills-comments-tab">
                    ...
                </div>

            </div>

        </div>
    </div>
@endsection

@section('scripts')


    @parent

    {{--    For datatable of tasks--}}
    <script>

        $.extend(true, $.fn.dataTable.defaults, {
            order: [[1, 'desc']],
            responsive: true,
            pageLength: 7,
            lengthMenu: [
                [7, 25, 50, -1],
                [7, 25, 50, "All"],
            ],
        });


        $('.datatable-Task').DataTable()
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc()
                .scroller.measure();
        });


        $(function () {

            $(".progress").each(function () {

                var value = $(this).attr('data-value');
                var left = $(this).find('.progress-left .progress-bar');
                var right = $(this).find('.progress-right .progress-bar');

                if (value > 0) {
                    if (value <= 50) {
                        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                    } else {
                        right.css('transform', 'rotate(180deg)')
                        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                    }
                }

            })

            function percentageToDegrees(percentage) {

                return percentage / 100 * 360

            }

        });
    </script>


    <!-- Plugins and scripts required by all views -->
    <!-- Charts -->
    <script src="{{asset('js/Chart.min.js')}}"></script>

    <script>

        var progress = document.getElementById("progress_WorkTracking").value;

        var doughnutData = {
            labels: [

                // 'Green',
                // 'Yellow'
            ],
            datasets: [{
                data: [ progress,(100-progress)],
                backgroundColor: [
                    '#1c7430',
                    // '#36A2EB',
                    // '#FFCE56'
                ],
                hoverBackgroundColor: [
                    '#1c7430',
                    // '#36A2EB',
                    // '#FFCE56'
                ]
            }]
        };
        var ctx = document.getElementById('canvas-3');
        var chart = new Chart(ctx, {
            type: 'doughnut',
            data: doughnutData,
            options: {
                responsive: true,
                cutoutPercentage: 90,
                animation: {
                    animateScale: true,
                    animateRotate: true,
                },
                elements: {
                    center: {
                        text: progress+' %'  //set as you wish
                    }
                },
            }
        });

    </script>


@endsection
