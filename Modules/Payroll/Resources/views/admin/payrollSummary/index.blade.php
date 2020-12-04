@extends('layouts.admin')
@section('content')
{{-- @inject('salaryTemplateModel', 'Modules\Payroll\Entities\SalaryTemplate') --}}
@inject('salaryPaymentModel', 'Modules\Payroll\Entities\SalaryPayment')
@inject('salaryDeductionModel', 'Modules\Payroll\Entities\SalaryDeduction')





@can('payroll_summary')
<!-- Search -->

<div class="card">
    <h5 class="card-header">Make Payment</h5>
    <form action="{{ route('payroll.admin.payroll-summary') }}" method="get">
        <div class="card-body">
            <div class="form-group margin d-flex justify-content-center">
                <div class="nav-link mr-2"><i class="fa fa-calendar"></i></div>
                <input class="form-control w-50" type="text" name="date" id="datepicker" value="{{ $date }}" required>
              </span>
          </div>

            <input type="submit" class="btn btn-primary d-flex justify-content-center m-auto d-block w-25" value="{{ __('Go') }}"/>
        </div>
    </form>
</div>

<!-- /.End Search -->
@endcan






<div class="card">
    <div class="card-header">
        Payroll Summary {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PayrollSummary">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryPaymentDetail.fields.name') }}
                        </th>
                        <th width="40">
                            {{ trans('cruds.salaryPaymentDetail.fields.salary_type') }}
                        </th>
                        {{-- <th>
                            Gross Salary
                        </th> --}}
                        <th>
                            {{ trans('cruds.salaryPayment.fields.net_salary') }}
                        </th>
                        <th>
                            Daily Salary
                        </th>
                        <th>
                            Total Days
                        </th>
                        <th>
                            Total Absents
                        </th>
                        <th>
                            Holidays
                        </th>
                        <th>
                            Vacations
                        </th>
                        <th>
                            Deductions
                        </th>
                        <th>
                            Late Minutes
                        </th>
                        {{-- <th>
                            Extra Minutes
                        </th> --}}
                        <th>
                            Bonus
                        </th>
                        <th>
                            Net Paid
                        </th>
                        <th>
                            Leave Details
                        </th>
                        <th>
                            Month
                        </th>
                    </tr>
                </thead>
                <tbody>


                    {{-- {{dd($users)}} --}}
                        @foreach($users as $key => $user)
                            @if ($user || $user['detail'])
                            <tr data-entry-id="{{ $user->user_id ?? $user['detail']->user_id}}">
                                @if ($date < date('Y-m'))

                                    <td class="user_name">
                                        {{ $user->username ?? '' }}
                                    </td>
                                    <td>
                                        {{$user->job_title}}
                                    </td>
                                    {{-- <td>
                                        {{'EGP '. number_format($user['salaryTemplate'] ? $user['salaryTemplate']->basic_salary : 0, 2)}}
                                    </td> --}}
                                    <td>{{'EGP '. number_format($user->net_salary ?? 0, 2)}}</td>

                                    <td>{{'EGP '. number_format($user->daily_salary ?? 0, 2)}}</td>

                                    <td>{{$user->total_days}}</td>

                                    <td>{{$user->total_absence}}</td>

                                    <td>{{$user->holidays}}</td>

                                    <td>{{$user->vacations}}</td>

                                    <td>
                                        <button class="btn btn-xs btn-secondary pt-1" disabled>
                                            {{'EGP '. number_format($user->deductions ?? 0, 2)}}
                                        </button>
                                    </td>
                                    {{-- Display Only The deduction amount if the month past. --}}

                                    <td>{{$user->late_minutes}}</td>
                                    {{-- <td>{{$user->extra_minutes}}</td> --}}
                                    <td>{{'EGP '. number_format($user->bonus ?? 0, 2)}}</td>

                                    <td>{{'EGP '. number_format($user->net_paid ?? 0, 2)}}</td>
                                    {{-- if Date is the present Month --}}
                                @else
                                    <td class="user_name">
                                        {{ $user['detail']->fullname ?? '' }}
                                    </td>
                                    <td>
                                        @if ($user['salaryTemplate'])
                                            {{$user['salaryTemplate']->salary_grade}}
                                        @else
                                            <span class="text-danger">Salary did not set yet</span>
                                        @endif
                                    </td>
                                    {{-- <td>
                                        {{'EGP '. number_format($user['salaryTemplate'] ? $user['salaryTemplate']->basic_salary : 0, 2)}}
                                    </td> --}}
                                    <td>{{'EGP '. number_format($user['netSalary'] ?? 0, 2)}}</td>

                                    <td>{{'EGP '. number_format($user['netSalary']/30 ?? 0, 2)}}</td>

                                    <td>{{$user['totalAttendedDays']}}</td>

                                    <td>{{$user['totalAbsentDays']}}</td>

                                    <td>{{$holidays}}</td>

                                    <td>{{$user['userVacations']}}</td>

                                    <td>
                                        <!-- Deduction Details -->
                                        <button type="button" class="btn btn-xs pt-1 {{($user['totalDeductions'] == 0) ? 'btn-info' : 'btn-danger'}} "
                                            data-toggle="modal" data-target="#deductionDetails{{$user['detail']->id}}">
                                            {{'EGP '. number_format($user['totalDeductions'] ?? 0, 2)}}
                                        </button>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deductionDetails{{$user['detail']->id}}" tabindex="-1" role="dialog" aria-labelledby="deductionDetails{{$user['detail']->id}}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="border-color: red;">
                                                <h5 class="modal-title" id="deductionDetails{{$user['detail']->id}}Title">{{ $user['detail']->fullname ?? '' }} Deduction Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-7">Petty Cache</div>
                                                    <div class="col-md-5">{{'EGP '. number_format(0, 2)}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">Fp Days</div>
                                                    <div class="col-md-5">{{'EGP '. number_format($user['fpDaysDeduction'] ?? 0, 2)}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">Minutes</div>
                                                    <div class="col-md-5">{{'EGP '. number_format($user['minutesDeduction'] ?? 0, 2)}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">Abssent Days</div>
                                                    <div class="col-md-5">{{'EGP '. number_format($user['totalAbsentDays'] * ($user['netSalary']/30) ?? 0, 2)}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">Deduction Leaves</div>
                                                    <div class="col-md-5">{{'EGP '. number_format($user['leavesDeduction'] ?? 0, 2)}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">Penalty</div>
                                                    <div class="col-md-5">{{'EGP '. number_format($user['penalty'] ?? 0, 2)}}</div>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between" style="background-color: #ccc;">
                                                {{-- <div class="row"> --}}
                                                    <div class="">Tota</div>
                                                    <div class="">{{'EGP '. number_format($user['totalDeductions'] ?? 0, 2)}}</div>
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    {{-- Show Modal Deduction Details if It's the current Month. --}}


                                    <td>{{$user['lateMinutes']}}</td>
                                    {{-- <td>{{$user['extraMinutes']}}</td> --}}
                                    <td>{{'EGP '. number_format($user['bonus'] ?? 0, 2)}}</td>

                                    <td>{{'EGP '. number_format(($user['netSalary'] + $user['bonus'] - $user['totalDeductions']) ?? 0, 2)}}</td>
                                    {{-- End if Date is the past Month --}}
                                @endif
                                    <td>
                                        <!-- Leave Details modal -->
                                        <button type="button" class="btn btn-primary btn-xs leaveDetails" data-toggle="modal" data-target="#leavesDetails{{$user->user_id ?? $user['detail']->user_id}}">
                                            <i class="fas fa-clipboard-list"></i>
                                        </button>
                                        <div class="leaveDetailsModal"></div>
                                    </td>

                                    <td>
                                        {{$date}}
                                    </td>
                            </tr>
                            @endif
                            {{-- end If user not null --}}
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script src="{{ asset('js/printPage.js') }}"></script>

<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
//   let table = $('.datatable-PayrollSummary:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  let table = $('.datatable-PayrollSummary:not(.ajaxTable)').DataTable({
    "buttons": [
       { "extend": 'pdf', "text":'PDF',"className": 'btn btn-default' },
       { "extend": 'csv', "text":'CSV',"className": 'btn btn-default' },
       { "extend": 'copy', "text":'Copy',"className": 'btn btn-default' },
       { "extend": 'print', "text":'Print',"className": 'btn btn-default' },
       { "extend": 'excel', "text":'Excel',"className": 'btn btn-default' },
    ],
    'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': false
            }
         }
      ],
   })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });


  $('.btnprn').printPage();



    $('.leaveDetailsModal').html(``);


    //Leave User Details Redirect Btn to modal blade
    $('.leaveDetails').click(function(){
        let userId = $(this).closest('tr').attr('data-entry-id');
        let userName = $(this).closest('tr').find('.user_name').text();
        let date = $('input[name="date"]').val();
        var e = $(this);
        $.ajax({
            url: '{{route("hr.admin.leave-applications.details")}}',
            type:'get',
            dataType: 'html',
            data: {
                user_id: userId,
                user_name: userName,
                date: date,
            },
            success: function(res){
                e.closest('td').find('.leaveDetailsModal').html(res);

                $('#leavesDetails'+userId).modal('toggle');
            }
        })
    });




    $("#datepicker").datepicker({
        format: "yyyy-mm",
        startView: "months",
        minViewMode: "months"
    });


})

</script>
@endsection
