@extends('layouts.admin')
@section('content')

<main class="main">
    <div class="container-fluid">

        <div class="animated fadeIn">
            <div class="">

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            {{trans('cruds.leaveApplication.title')}} {{trans('global.reports')}}
                            <a href="{{route('hr.admin.leave-applications.index')}}" class="btn btn-secondary btn-sm">{{trans('global.back_to_list')}}</a>
                        </div>

                        <input type="hidden" id="annual" value="{{$annual['token_leaves']}}"/>
                        <input type="hidden" id="emergency" value="{{$emergency['token_leaves']}}"/>
                        <input type="hidden" id="sick" value="{{$sick['token_leaves']}}"/>
                        <input type="hidden" id="home" value="{{$home['token_leaves']}}"/>
                        <input type="hidden" id="clockLate" value="{{$clockLate['token_leaves']}}"/>


                        <input type="hidden" id="annualLeaveQuata" value="{{$annual['category_leave_quota']}}"/>
                        <input type="hidden" id="emergencyLeaveQuata" value="{{$emergency['category_leave_quota']}}"/>
                        <input type="hidden" id="sickLeaveQuata" value="{{$sick['category_leave_quota']}}"/>
                        <input type="hidden" id="homeLeaveQuata" value="{{$home['category_leave_quota']}}"/>
                        <input type="hidden" id="clockLateLeaveQuata" value="{{$clockLate['category_leave_quota']}}"/>
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

        var annualLeaveQuata     = document.getElementById("annualLeaveQuata").value;
        var emergencyLeaveQuata  = document.getElementById("emergencyLeaveQuata").value;
        var sickLeaveQuata       = document.getElementById("sickLeaveQuata").value;
        var homeLeaveQuata       = document.getElementById("homeLeaveQuata").value;
        var clockLateLeaveQuata  = document.getElementById("clockLateLeaveQuata").value;
        let leaveQuota = '{{trans('cruds.leaveCategory.fields.leave_quota')}}';
        let tokens     = '{{trans('cruds.status.token')}}'
        var pieData = {
            labels: [
                `{{trans('cruds.status.annual')}} ( ${leaveQuota} : ${annualLeaveQuata} ${tokens} : ${annual} )`,
                `{{trans('cruds.status.emergency')}} ( ${leaveQuota} : ${emergencyLeaveQuata} ${tokens} : ${emergency} )`,
                `{{trans('cruds.status.sick')}} ( ${leaveQuota} : ${sickLeaveQuata} ${tokens} : ${sick} )`,
                `{{trans('cruds.status.home')}} ( ${leaveQuota} : ${homeLeaveQuata} ${tokens} : ${home} )`,
                `{{trans('cruds.status.clockLate')}} ( ${leaveQuota} : ${clockLateLeaveQuata} ${tokens} : ${clockLate} )`,
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