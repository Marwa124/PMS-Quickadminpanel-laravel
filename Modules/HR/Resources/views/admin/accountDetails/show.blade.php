@extends('layouts.admin')
@inject('salaryDeductionModel', 'Modules\Payroll\Entities\SalaryDeduction')
@section('title')
| User Details
@endsection
@section('styles')
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet" />
@endsection
@section('content')

@inject('leaveCategoryModel', 'Modules\HR\Entities\LeaveCategory')

<div class="row" style="background-color: #ccc;">
    <div class="row col-sm-4"></div>
    <div class="col-sm-3">
        <div class="">
            <div class="text-center">
                <img class="img-thumbnail rounded-circle" width="30%" src="{{ $accountDetail->avatar ? str_replace('storage', 'storage', $accountDetail->avatar->getUrl()) : asset('images/default.png') }}" alt="">
            </div>
            <h3 class="m0 text-center">{{ $accountDetail->fullname ?? '' }}</h3>
            <p class="text-center">
                {{'EMP ID: '. $accountDetail->employment_id }}
            </p>
            <p class="text-center">
                {{ $accountDetail->designation()->first() ? ($accountDetail->designation->department()->first() ? $accountDetail->designation->department()->first()->department_name : '') .' => '. $accountDetail->designation()->first()->designation_name : ''}}
            </p>
        </div>
    </div>
    <div class="col-md-5"></div>
</div>


<div class="row">
    <div class="col-3">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-details-tab" data-toggle="pill" href="#v-pills-details" role="tab" aria-controls="v-pills-details" aria-selected="true">Basic Details</a>
        {{-- <a class="nav-link" id="v-pills-bank-tab" data-toggle="pill" href="#v-pills-bank" role="tab" aria-controls="v-pills-bank" aria-selected="false">Bank Details</a> --}}
        <a class="nav-link" id="v-pills-salary-tab" data-toggle="pill" href="#v-pills-salary" role="tab" aria-controls="v-pills-salary" aria-selected="false">Salary Details</a>
        <a class="nav-link" id="v-pills-leaves-tab" data-toggle="pill" href="#v-pills-leaves" role="tab" aria-controls="v-pills-leaves" aria-selected="false">Leave Details</a>
        {{-- <a class="nav-link" id="v-pills-timecard-tab" data-toggle="pill" href="#v-pills-timecard" role="tab" aria-controls="v-pills-timecard" aria-selected="false">Timecard Details</a> --}}
        <a class="nav-link" id="v-pills-tasks-tab" data-toggle="pill" href="#v-pills-tasks" role="tab" aria-controls="v-pills-tasks" aria-selected="false">Tasks</a>
        <a class="nav-link" id="v-pills-projects-tab" data-toggle="pill" href="#v-pills-projects" role="tab" aria-controls="v-pills-projects" aria-selected="false">Projects</a>
        <a class="nav-link" id="v-pills-pills-tab" data-toggle="pill" href="#v-pills-activity" role="tab" aria-controls="v-pills-activity" aria-selected="false">Activities</a>

      </div>
    </div>
    <div class="col-9">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-details" role="tabpanel" aria-labelledby="v-pills-details-tab">
            <div class="card">
                <h5 class="card-header">{{ $accountDetail->fullname }}</h5>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-6">
                            <div class="row"> <p class="font-bold col-md-5">EMP ID:</p> <span class="col-md-7">{{ $accountDetail->employment_id }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-5">Username: </p><span class="col-md-7">{{ $accountDetail->user->name }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-5">Joining Date:</p> <span class="col-md-7">{{ $accountDetail->joining_date }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-5">Date Of Birth:</p> <span class="col-md-7">{{ $accountDetail->date_of_birth }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-5">Father Name:</p> <span class="col-md-7">{{ $accountDetail->father_name }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-5">Email: </p><span class="col-md-7">{{ $accountDetail->user->email }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-5">Mobile:</p> <span class="col-md-7">{{ $accountDetail->mobile }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-5">Present Address: </p><span class="col-md-7">{{ $accountDetail->present_address }}</span> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row"> <p class="font-bold col-md-5">Full Name:</p> <span class="col-md-7">{{ $accountDetail->fullname }}</span> </div>

                            <?php
                                $user = Auth::user()->hasRole('Admin') ? true : false;
                                $owner = (Auth::user()->id == $accountDetail->user->id) ? true : false;
                            ?>
                            @if ($owner || $user)

                            <div class="row"> <p class="font-bold col-md-5">Password: </p><span class="col-md-7">

                                <button  data-toggle="modal" data-target="#passwordModal" class="btn-xs btn-link passwordBtn">
                                    {{ trans('global.change_password') }}
                                </button>
                            <!-- Modal -->
                            <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="passwordModalLabel">{{ trans('global.change_password') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- <div class="error-msg alert alert-danger" role="alert">
                                        </div> --}}
                                        <div class="error-msg">
                                            <ul class="alert alert-danger" role="alert">
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="userId" id="userId" value="{{ $accountDetail->user->id }}">
                                            <input placeholder="Enter your Current Password" class="form-control {{ $errors->has('designation_name') ? 'is-invalid' : '' }}" type="password" name="old_password" id="old_password" value="{{ old('old_password', '') }}" required>
                                            @if($errors->has('old_password'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('old_password') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input placeholder="Enter New Password" id="password" type="password" name="password" class="form-control" required placeholder="{{ trans('global.login_password') }}">

                                            @if($errors->has('password'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('password') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input placeholder="Enter Confirm Password" id="password-confirm" type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="resetPassword btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            {{-- End Modal --}}

                            </span> </div>
                            @endif

                            <div class="row"> <p class="font-bold col-md-5">Gender:</p> <span class="col-md-7">{{ $accountDetail->gender }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-5">Maratial Status:</p> <span class="col-md-7">{{ $accountDetail->maratial_status }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-5">Mothers Name:</p> <span class="col-md-7">{{ $accountDetail->mother_name }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-5">Phone: </p><span class="col-md-7">{{ $accountDetail->phone }}</span> </div>
                            <div class="row"> <p class="font-bold col-md-5">Skype:</p> <span class="col-md-7">{{ $accountDetail->skype }}</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-bank" role="tabpanel" aria-labelledby="v-pills-bank-tab">...</div>
        <div class="tab-pane fade" id="v-pills-salary" role="tabpanel" aria-labelledby="v-pills-salary-tab">


            <?php
                $salaryTemplate = '';
                $designation = $accountDetail->designation()->first();
                if ($designation) {
                    $salaryTemplate = $accountDetail->designation->salaryTemplate()->first();
                    $departmentName = $accountDetail->designation->department()->select('department_name')->first();
                }
                // dd($salaryTemplate->salaryAllowances()->get());
                // dd($salaryTemplate->salaryDeductions()->get());
            ?>

            <div class="card">
                <div class="card-header">
                    Salary Details
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">Designation: </div>
                        <div class="col-md-7">{{ $salaryTemplate ? $salaryTemplate->salary_grade : '' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Basic Salary : </div>
                        <div class="col-md-7">{{ $salaryTemplate ? $salaryTemplate->basic_salary : '' }}</div>
                    </div>
                </div>

                <?php
                $userAllowances = $salaryTemplate->salaryAllowances()->get();
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Allowances
                            </div>
                            <div class="card-body">
                                @forelse ($userAllowances as $userAllowance)
                                    <div class="row">
                                        <div class="col-md-5">{{$userAllowance->name}} </div>
                                        <div class="col-md-7">{{ $userAllowance->value }}</div>
                                    </div>
                                @empty
                                <h5>Nothing to display here!</h5>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <?php
                    $userDeducctions = $salaryTemplate->salaryDeductions()->get();
                    ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Deductions
                            </div>
                            <div class="card-body">
                                @forelse ($userDeducctions as $userDeduction)
                                    <div class="row">
                                        <div class="col-md-5">{{$userDeduction->name}} </div>
                                        <div class="col-md-7">{{ $userDeduction->value }}</div>
                                    </div>
                                @empty
                                <h5>Nothing to display here!</h5>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>


                <?php
                    $netSalary = 0;
                    if ($salaryTemplate) {
                        $salaryDeduction = $salaryDeductionModel->where('salary_template_id', $salaryTemplate->id)->sum('value');
                        $netSalary = (int) ($salaryTemplate->basic_salary) - (int) $salaryDeduction;
                    }
                ?>
                <div class="card">
                    <div class="card-header bg-secondary">
                        Total Salary Details
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="font-weight-bold m-auto">Gross Salary: </div>
                            <span class="m-auto">{{'EGP '.number_format($salaryTemplate ? $salaryTemplate->basic_salary : 0, 2)}}</span>
                        </div>
                        <div class="d-flex">
                            <div class="font-weight-bold m-auto">Total Deduction :                            </div>
                            <span class="m-auto">{{'EGP '.number_format($salaryDeduction ?? 0, 2)}}</span>
                        </div>
                        <div class="d-flex">
                            <div class="font-weight-bold m-auto">Net Salary :                            </div>
                            <span class="m-auto">{{'EGP '.number_format($netSalary ?? 0, 2)}}</span>
                        </div>
                    </div>
                </div>

            </div>














        </div>
        <div class="tab-pane fade" id="v-pills-leaves" role="tabpanel" aria-labelledby="v-pills-leaves-tab">

            {{-- Leave Details --}}
            <?php $total_token = 0; ?>
            <div class="card">
                <h5 class="card-header">Leave Details Of {{$accountDetail->fullname}}</h5>
                <div class="card-body">
                    @foreach ($categoryDetails as $item)
                    {{-- {{dd($item['check_available']['token_leaves'])}}
                    {{dd($item['check_available']['category_leave_quota'])}} --}}
                    <div class="row">
                        <div class="col-md-6">{{$item['name']}}</div>
                        <div class="col-md-6">
                            <?php $total_token += $item['check_available']['token_leaves'];?>
                            {{$item['check_available']['token_leaves']}}
                            /{{$item['check_available']['category_leave_quota']}}</div>
                            {{-- {{checkAvailableLeaves(auth()->user()->id, date('Y-m'), $item->id)}} --}}

                    </div>
                    @endforeach
                    <div class="card-footer">
                       <div class="row">
                           <div class="col-md-6">Total:</div>
                           <div class="col-md-6">
                               <?php
                                    $total = 0;
                                    foreach ($leaveCategoryModel::select('leave_quota')->get() as $key => $value) {
                                        $var = (int) $value->leave_quota;
                                        $total += $var;
                                    }
                               ?>
                               {{$total_token}}/{{$total}}
                           </div>
                       </div>
                      </div>
                </div>
              </div>
              {{-- Leave Details --}}


        </div>
        <div class="tab-pane fade" id="v-pills-timecard" role="tabpanel" aria-labelledby="v-pills-timecard-tab">...</div>
        <div class="tab-pane fade" id="v-pills-tasks" role="tabpanel" aria-labelledby="v-pills-tasks-tab">

            <?php
                $tasks = [];
                $tasks = $accountDetail->tasks;
            ?>
{{-- User Tasks Sheet --}}
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
            @empty
            @endforelse
            <div  class="align-content-center p-4">
                <h1>{{ get_time_spent_result($total_spend)  }}</h1>
                <h6 class="align-content-center">{{trans('global.hours')}} : {{trans('global.minutes')}} : {{trans('global.seconds')}}</h6>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        {{trans('cruds.task.title')}} {{trans('global.reports')}}
        <input type="hidden" id="not_started_count"     value="{{$tasks ? $tasks->where('status','not_started')->count() : ''}}"/>
        <input type="hidden" id="in_progress_count"     value="{{$tasks ? $tasks->where('status','in_progress')->count() : ''}}"/>
        <input type="hidden" id="completed_count"       value="{{$tasks ? $tasks->where('status','completed')->count() : ''}}"/>
        <input type="hidden" id="deffered_count"        value="{{$tasks ? $tasks->where('status','deffered')->count() : ''}}"/>
        <input type="hidden" id="waiting_someone_count" value="{{$tasks ? $tasks->where('status','waiting_someone')->count() : ''}}"/>
    </div>
    <div class="card-body">
        <div class="chart-wrapper">
            <canvas id="canvas-5"></canvas>
        </div>
    </div>
</div>
{{-- User Tasks Sheet --}}
        </div>

        <div class="tab-pane fade" id="v-pills-projects" role="tabpanel" aria-labelledby="v-pills-projects-tab">





            <?php
                // $projects = [];
                $projects = $accountDetail->projects;
            ?>
{{-- User Projects Sheet --}}
<div class="card">
    <div class="card-header">
        {{trans('cruds.project.fields.total_projects_time_spent')}}

    </div>
    <div class="card-body text-center">
        <div class="chart-wrapper">
            @php
                $total_spend_project = 0;
            @endphp
            @forelse($projects as $project)
                @php
                    $tasks = $project->tasks;
                    $timeProject = $project->TimeSheet;
                @endphp

                {{--get user time spend in project--}}
                @forelse($timeProject as $timer)

                    @if($timer->end_time && $timer->start_time)
                        @php
                            $total_spend_project += ($timer->end_time - $timer->start_time);
                        @endphp
                    @endif
                @empty
                @endforelse
                {{--get user time spend in project--}}
            @empty
            @endforelse
            <div  class="align-content-center p-4">

                <h1>{{ get_time_spent_result($total_spend_project)  }}</h1>
                <h6 class="align-content-center">{{trans('global.hours')}} : {{trans('global.minutes')}} : {{trans('global.seconds')}}</h6>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{trans('cruds.project.title')}} {{trans('global.reports')}}
        <input type="hidden" id="started_count" value="{{$projects ? $projects->where('project_status','started')->count() : ''}}"/>
        <input type="hidden" id="in_progress_count_project" value="{{$projects ? $projects->where('project_status','in_progress')->count() : ''}}"/>
        <input type="hidden" id="on_hold_count" value="{{$projects ? $projects->where('project_status','on_hold')->count() : ''}}"/>
        <input type="hidden" id="cancel_count" value="{{$projects ? $projects->where('project_status','cancel')->count() : ''}}"/>
        <input type="hidden" id="completed_count_project" value="{{$projects ? $projects->where('project_status','completed')->count() : ''}}"/>
        <input type="hidden" id="overdue_count" value="{{$projects ? $projects->where('project_status','overdue')->count() : ''}}"/>
    </div>
    <div class="card-body">
        <div class="chart-wrapper">
            <canvas id="canvas-5-project"></canvas>
        </div>
    </div>
</div>
{{-- User Projects Sheet --}}





        </div>

        <div class="tab-pane fade" id="v-pills-activity" role="tabpanel" aria-labelledby="v-pills-activity-tab">

            <div class="card">
                <div class="card-header">
                    All Activities
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Module</th>
                            <th scope="col">Activity</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                $userActivities = Modules\ProjectManagement\Entities\Activity::where('user_id', $accountDetail->user_id)->get();
                                ?>
                            @forelse ($userActivities as $item)

                            <tr>
                                <th scope="row">{{ date("Y-m-d g:i a", strtotime($item->activity_date)) }}</th>
                                <td>{{$accountDetail->fullname}}</td>
                                <td class="text-capitalize">
                                    {{trans('cruds.'.$item->module.'.title')}}
                                </td>
                                <td colspan="2">{{$item['activity_'.app()->getLocale()]}}
                                    @if ($item->module == 'leaveApplication')
                                    <?php
                                        $userLeave = Modules\HR\Entities\LeaveApplication::findOrfail($item->module_field_id);
                                    ?>
                                        <span class="font-weight-bold"> {{$accountDetail->fullname}} -> {{$item->value1_en}} <span>
                                        {{$userLeave->leave_start_date}} {{($userLeave->leave_end_date != $userLeave->leave_start_date) ? ' To '. $userLeave->leave_end_date : ''}}
                                    @endif
                                    @if ($item->module == 'project')
                                        <?php
                                            $userProject = Modules\ProjectManagement\Entities\Project::findOrFail($item->module_field_id);
                                        ?>
                                        <span class="font-weight-bold"> {{$userProject['name_'.app()->getLocale()]}} <span>
                                    @endif
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                      </table>
                </div>
              </div>

        </div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')
<script src="{{asset('js/Chart.min.js')}}"></script>

<script>
    $('.error-msg .alert-danger').css('display', 'none');

    $('.resetPassword').click(function(){
        var old_pass = $('input[name=old_password]').val();
        var new_pass = $('input[name=password]').val();
        var confirm_pass = $('input[name=password_confirmation]').val();
        var token = $('input[name=_token]').val();
        var user_id = $('input[name=userId]').val();
        $.ajax({
            type: 'POST',
            url: "{{route('hr.admin.account-details.passwordReset')}}",
            data: {
                _token: token,
                old_password: old_pass,
                password: new_pass,
                password_confirmation: confirm_pass,
                userId: user_id,
            },
            success: function(data) {
                if (data == 'success') {
                    let passwordModal = document.querySelector('#passwordModal');
                        passwordModal.classList.add('close');
                        $('.error-msg .alert-danger').css('display', 'none');
                        $('.error-msg .alert-danger').html(``);
                        // Reset Input value
                        passwordModal.querySelectorAll('input').forEach(element => {
                            if (element.getAttribute('type') != 'hidden') {
                                element.value = ''
                            }
                        });
                        // ---------Reset Input value

                        passwordModal.setAttribute('data-dismiss', 'modal');
                        passwordModal.click()
                        passwordModal.classList.remove('close');
                        passwordModal.removeAttribute('data-dismiss');
                }else {
                        $('.error-msg .alert-danger').css('display', 'block');
                        $('.error-msg .alert-danger').html(``);
                        if (typeof data == 'object') {
                            $.each( data, function( index, value ){
                                value.forEach(err => {
                                    $('.error-msg .alert-danger').append(`<li>`+err+`</li>`);
                                });
                            });
                        }else {
                            $('.error-msg .alert-danger').append(`<li>`+data+`</li>`);
                        }
                }
            },
        })
    })
</script>
{{-- tasks Report --}}
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
{{-- tasks Report --}}



{{-- Projects Report --}}
    <script>
        var started_count_project       = document.getElementById("started_count").value;
        var in_progress_count_project   = document.getElementById("in_progress_count_project").value;
        var on_hold_count_project       = document.getElementById("on_hold_count").value;
        var cancel_count_project        = document.getElementById("cancel_count").value;
        var completed_count_project     = document.getElementById("completed_count_project").value;
        var overdue_count_project       = document.getElementById("overdue_count").value;

        var pieData_project = {
            labels: [
                '{{trans('cruds.status.started')}}',
                '{{trans('cruds.status.in_progress')}}',
                '{{trans('cruds.status.on_hold')}}',
                '{{trans('cruds.status.cancel')}}',
                '{{trans('cruds.status.completed')}}',
                '{{trans('cruds.status.overdue')}}',
            ],
            datasets: [{
                data: [started_count_project,in_progress_count_project,on_hold_count_project,cancel_count_project,completed_count_project,overdue_count_project],
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
        var ctx_project = document.getElementById('canvas-5-project');
        var chart_project = new Chart(ctx_project, {
            type: 'pie',
            data: pieData_project,
            options: {
                responsive: true
            }
        });
    </script>
{{-- Projects Report --}}

@endsection
