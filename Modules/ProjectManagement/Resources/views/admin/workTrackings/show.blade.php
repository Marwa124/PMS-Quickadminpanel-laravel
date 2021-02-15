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
                    <a class="nav-link active" id="v-pills-details-tab" data-toggle="pill" href="#v-pills-details" role="tab" aria-controls="v-pills-details" aria-selected="true">{{ trans('cruds.workTracking.title') }} {{trans('global.details')}}</a>
                    <a class="nav-link" id="v-pills-comments-tab"       data-toggle="pill" href="#v-pills-comments" role="tab" aria-controls="v-pills-comments" aria-selected="false">{{ trans('cruds.comment.title') }}<span class="float-right">          {{$workTracking->comments_with_replies && $workTracking->comments_with_replies()->count() > 0 ? $workTracking->comments_with_replies()->count() : ''}}</span></a>
                    {{--<a class="nav-link" id="v-pills-tasks-tab" data-toggle="pill" href="#v-pills-tasks" role="tab" aria-controls="v-pills-tasks" aria-selected="false"> {{ trans('cruds.task.title') }}<span class="float-right">{{$workTracking->tasks->count() > 0 ? $workTracking->tasks->count() : ''}}</span></a>--}}
                    <a class="nav-link" id="v-pills-activities-tab"     data-toggle="pill" href="#v-pills-activities" role="tab" aria-controls="v-pills-activities" aria-selected="false">{{ trans('cruds.activities.title') }}<span class="float-right">   {{$workTracking->activities()->count() > 0 ? $workTracking->activities()->count() : ''}}</span></a>
                </div>
            </div>
        </div>
        <div class="col-9">

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-details" role="tabpanel" aria-labelledby="v-pills-details-tab">

                    <div class="card">
                        <h5 class="card-header">{{ $workTracking->{'subject_'.app()->getLocale()} ?? '' }}
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
                                                :</p> <span class="col-md-6">{{ $workTracking->{'subject_'.app()->getLocale()} ?? '' }}</span>
                                        </div>
                                        <div class="row">
                                            <p class="font-bold col-md-6">{{ trans('cruds.workTracking.fields.work_type') }}
                                                : </p><span class="col-md-6">{{ $workTracking->work_type && $workTracking->work_type->name ? trans('cruds.timeWorkType.'.$workTracking->work_type->name ) : '' }}</span>
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
                                                : </p><span class="col-md-6">{{ $workTracking->{'description_'.app()->getLocale()} ?? '' }}</span></div>
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
                                            <div style="position:relative">
                                                <canvas id="canvas-3" height="150"></canvas>
                                                <h2 style="display:inline;">{{$result['progress_WorkTracking']}} %</h2>
                                            </div>
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
                                                            <li><a href="{{route('admin.users.show',$activity->user ? $activity->user->id :'')}}">{{$activity->user && $activity->user->name ? $activity->user->name : ''}}</a> {{$activity->{'activity_'.app()->getLocale()} ?? ''}} <strong> {{$activity->{'value1_'.app()->getLocale()} ?? ''}} </strong></li>
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
                    <div class="card"  >
                        <h5 class="card-header">{{ trans('cruds.comment.title') }} </h5>
                        <div class="card-body">


                            <form action="{{ route('projectmanagement.admin.work-trackings.add_comment') }}" method="post" class="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="workTracking_id" value="{{ $workTracking->id }}">

                                <div class="col-lg-12 col-md-12" style="padding-bottom: 20px;">

                                    <label class="form-group " for="comment">{{ trans('cruds.comment.title_singular') }}</label>
                                    <textarea class="form-control ckeditor {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" id="comment">{!! old('comment')!!}</textarea>

                                </div>



                                <div class="col-12 ">
                                    <button type="submit" class="btn btn-primary float-right" >{{ trans('global.save') }}</button>
                                </div>
                            </form>
                            <hr class="col-md-11 ml-3">
                            @foreach($workTracking->comments as $comment)
                                <div class="col-md-12 ml-1" style="margin-bottom: 40px;">
                                    <div class="col-md-12">
                                        <img  class="img-thumbnail rounded-circle" title="{{ $comment->user && $comment->user->name ? $comment->user->name : '' }}" width="5%" src="{{ $comment->user && $comment->user->accountDetail ? str_replace('storage', 'storage', $comment->user && $comment->user->accountDetail ? $comment->user->accountDetail->avatar->getUrl() : '') : asset('images/default.png') }}" alt="{{ $comment->user && $comment->user->accountDetail && $comment->user->accountDetail->fullname ? $comment->user->accountDetail->fullname : '' }}">

                                        {{$comment->user && $comment->user->name ? $comment->user->name  : ''}}

                                        <strong> {!! $comment->comment !!}</strong>
                                        <a id="add-replay" onclick="addReplay('{{$comment->id}}')" type="button" class="mb-5" >
                                            <i class="fa fa-reply"></i>
                                            {{ trans('cruds.ticket.fields.replay') }}
                                        </a>
                                    </div>

                                    {{--                                                                replies of replay--}}
                                    @if(isset($comment->replay))

                                        @foreach($comment->replay as $comment_of_replay)
                                            <div class="col-md-10 ml-5">
                                                <img  class="img-thumbnail rounded-circle" title="{{ $comment->user && $comment->user->name ? $comment->user->name : '' }}" width="5%" src="{{ $comment->user && $comment->user->accountDetail ? str_replace('storage', 'storage', $comment->user && $comment->user->accountDetail ? $comment->user->accountDetail->avatar->getUrl() : '') : asset('images/default.png') }}" alt="{{ $comment->user && $comment->user->accountDetail && $comment->user->accountDetail->fullname ? $comment->user->accountDetail->fullname : '' }}">

                                                {{$comment_of_replay->user && $comment_of_replay->user->name ? $comment_of_replay->user->name : ''}}

                                                <strong> {!! $comment_of_replay->comment !!}</strong>
                                            </div>
                                            <hr class="col-md-10">
                                        @endforeach
                                    @endif


                                    <div class="replay" id="replay_{{$comment->id}}" style="display:{{$errors->has('replay_comment') ? 'block': 'none'}}" >

                                        <form action="{{ route('projectmanagement.admin.work-trackings.add_comment') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="workTracking_id" value="{{ $workTracking->id }}">
                                            <input type="hidden" name="comment_replay_id" value="{{ $comment->id }}">

                                            <div class="col-lg-12 col-md-12" style="padding-bottom: 20px;">

                                                <label class="form-group " for="replay_comment">{{ trans('cruds.ticket.fields.replay') }}</label>
                                                <textarea class="form-control ckeditor {{ $errors->has('replay_comment') ? 'is-invalid' : '' }}"  name="replay_comment" id="replay_comment">{!! old('replay_comment')!!}</textarea>

                                            </div>

                                            <div class="col-12 pb-5">
                                                <button type="submit" id="replaySubmitBtn" class="btn btn-primary float-right" >{{ trans('global.save') }}</button>
                                            </div>
                                        </form>
                                    </div>


                                    <hr class="col-md-11">



                                </div>


                                {{--                                                        @if(json_decode($comment->attachments))--}}
                                {{--                                                            <div class="col-md-4 mb-2 ml-2">--}}
                                {{--                                                                <button  type="button" data-toggle="modal" data-target="#replay_{{ $comment->id }}" class="btn btn-secondary" style="border-radius: 0;" >--}}
                                {{--                                                                    @lang('locale.view_attachments')--}}
                                {{--                                                                </button>--}}
                                {{--                                                            </div>--}}
                                {{--                                                        @endif--}}





                                <div class="modal-info mr-1 mb-1 d-inline-block">
                                    <div class="modal fade text-left" id="replay_attach_{{ $comment->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel130" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                            <div class="modal-content" style="height:500px;width:700px;">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        {{--                                                                                                        @forelse(json_decode($comment->attachments) as $attach)--}}


                                                        {{--                                                                                                            <div class="col-md-4">--}}
                                                        {{--                                                                                                                <a  target="_blank" href="{{ asset('uploads/projects/'.$attach) }}">--}}

                                                        {{--                                                                                                                    @if(strpos($attach,'.pdf') !== false)--}}
                                                        {{--                                                                                                                        <img style="width:150px;height:180px;" src="{{ asset('pdf.png') }}" alt="">--}}
                                                        {{--                                                                                                                    @elseif(strpos($attach,'.xlsx') !== false || strpos($attach,'.xls') !== false || strpos($attach,'.csv') !== false || strpos($attach,'.txt') !== false)--}}
                                                        {{--                                                                                                                        <img style="width:150px;height:180px;" src="{{ asset('excel.png') }}" alt="">--}}

                                                        {{--                                                                                                                    @else--}}
                                                        {{--                                                                                                                        <img style="width:150px;height:200px;" src="{{ asset('uploads/projects/'.$attach) }}" alt="">--}}
                                                        {{--                                                                                                                    @endif--}}
                                                        {{--                                                                                                                </a>--}}

                                                        {{--                                                                                                            </div>--}}
                                                        {{--                                                                                                        @empty--}}
                                                        {{--                                                                                                            No Attachments found--}}
                                                        {{--                                                                                                        @endforelse--}}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                        </div>
                    </div>

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

        // comment and replay on comment

        var count = 0;
        function replayForm() {
            if (count % 2 == 0){


                // document.getElementById("replay").classList.add('visible');
                // document.getElementById("replay").classList.remove('invisible');
                document.getElementById("replay_ticket").style.display = 'block';

                count++;
            }else {
                // document.getElementById("replay").classList.add('invisible');
                //
                // document.getElementById("replay").classList.remove('visible');
                document.getElementById("replay_ticket").style.display = 'none';
                count++;
            }

        }

        // CKEDITOR.replace('body');

        $('.replay_submit').click(function(){

            $('.replay_ticket').removeClass('hidden');
        })

        $('.replay_submit').dblclick(function(){

            $('.replay_ticket').addClass('hidden');
            $('.replay_submit').removeClass('disabled');
        })

        var i = 0;
        function addReplay(replay_id) {

            if (i % 2 == 0){

                document.getElementById("replay_"+replay_id).style.display = 'block';
                i++;
            }else {

                document.getElementById("replay_"+replay_id).style.display = 'none';
                i++;
            }

        }

    </script>


@endsection
