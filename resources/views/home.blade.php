@extends('layouts.admin')

@inject('fingerprintModel', 'Modules\HR\Entities\FingerprintAttendance')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <?php
                    $systemClockIn = false;
                    $allUserLeaves = auth()->user()->leaveApplications()->where('application_status', 'accepted')->get();
                    foreach ($allUserLeaves as $key => $value) {
                        if ($value->leave_category()->first()->name == 'Working From Home') {
                            if ($value->leave_start_date == date('Y-m-d')) {
                                // $hasFingerprint = $fingerprintModel::where('date', date('Y-m-d'))
                                //         ->where('user_id', auth()->user()->id)->latest()->first();
                                        // dd($hasFingerprint);
                                $systemClockIn = true;
                            }
                        }
                    }
                ?>

                <div class="card-header d-flex justify-content-between">
                    Dashboard
                    @if ($systemClockIn)
                        <button class="btn btn-danger mark_attendance">Clock In</button>
                @endif
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="{{ $chart1->options['column_class'] }}">
                            <h3>{!! $chart1->options['chart_title'] !!}</h3>
                            {!! $chart1->renderHtml() !!}
                        </div>
                        <div class="{{ $chart2->options['column_class'] }}">
                            <h3>{!! $chart2->options['chart_title'] !!}</h3>
                            {!! $chart2->renderHtml() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        var authUserId = $('.hidden_auth_user_id').val();

        $('.mark_attendance').click(function(){
            $('.mark_attendance').toggleClass('btn-danger');
            $('.mark_attendance').toggleClass('btn-success');
            if ($(this).hasClass('btn-danger')) {
                $(this).text('Clock In');
                console.log('danger');
                $.ajax({
                    url: '{{url('admin/hr/leave-applications/mark-attendance')}}/' + authUserId,
                    data:{type: 'clock_out'},
                })
            }else if($(this).hasClass('btn-success')){
                $(this).text('Clock Out');
                $.ajax({
                    url: '{{url('admin/hr/leave-applications/mark-attendance')}}/' + authUserId,
                    data:{type: 'clock_in'},
                })
            }
        });
    });
</script>
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>{!! $chart1->renderJs() !!}{!! $chart2->renderJs() !!}
@endsection
