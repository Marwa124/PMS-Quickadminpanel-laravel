@extends('layouts.admin')
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
                {{ $accountDetail->designation()->first() ? $accountDetail->designation->department()->first()->department_name .' => '. $accountDetail->designation()->first()->designation_name : ''}}
            </p>
        </div>
    </div>
    <div class="col-md-5"></div>
</div>


<div class="row">
    <div class="col-3">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-details-tab" data-toggle="pill" href="#v-pills-details" role="tab" aria-controls="v-pills-details" aria-selected="true">Basic Details</a>
        <a class="nav-link" id="v-pills-bank-tab" data-toggle="pill" href="#v-pills-bank" role="tab" aria-controls="v-pills-bank" aria-selected="false">Bank Details</a>
        <a class="nav-link" id="v-pills-salary-tab" data-toggle="pill" href="#v-pills-salary" role="tab" aria-controls="v-pills-salary" aria-selected="false">Salary Details</a>
        <a class="nav-link" id="v-pills-leaves-tab" data-toggle="pill" href="#v-pills-leaves" role="tab" aria-controls="v-pills-leaves" aria-selected="false">Leave Details</a>
        <a class="nav-link" id="v-pills-timecard-tab" data-toggle="pill" href="#v-pills-timecard" role="tab" aria-controls="v-pills-timecard" aria-selected="false">Timecard Details</a>
        <a class="nav-link" id="v-pills-tasks-tab" data-toggle="pill" href="#v-pills-tasks" role="tab" aria-controls="v-pills-tasks" aria-selected="false">Tasks</a>
        <a class="nav-link" id="v-pills-projects-tab" data-toggle="pill" href="#v-pills-projects" role="tab" aria-controls="v-pills-projects" aria-selected="false">Projects</a>
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
                                // $user = Auth::user()->role ? (Auth::user()->role->title == 'Admin' ? true : false) : false;
                                $owner = (Auth::user()->id == $accountDetail->user->id) ? true : false;
                            ?>
                            @if ($owner || $user)

                            <div class="row"> <p class="font-bold col-md-5">Password: </p><span class="col-md-7">



                                <button  data-toggle="modal" data-target="#passwordModal" class="btn-xs btn-link passwordBtn">Reset Password
                                </button>
                            <!-- Modal -->
                            <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="passwordModalLabel">Reset Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
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
        <div class="tab-pane fade" id="v-pills-salary" role="tabpanel" aria-labelledby="v-pills-salary-tab">...</div>
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
        <div class="tab-pane fade" id="v-pills-tasks" role="tabpanel" aria-labelledby="v-pills-tasks-tab">...</div>
        <div class="tab-pane fade" id="v-pills-projects" role="tabpanel" aria-labelledby="v-pills-projects-tab">...</div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')
<script>
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
            success: function() {

            }
        })
    })
</script>
@endsection
