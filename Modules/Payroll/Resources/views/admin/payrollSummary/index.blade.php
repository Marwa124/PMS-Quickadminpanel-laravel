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
                        <th>
                            Gross Salary
                        </th>
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
                        <th>
                            Extra Minutes
                        </th>
                        <th>
                            Net Paid
                        </th>
                        <th>
                            Month
                        </th>
                    </tr>
                </thead>
                <tbody>
@php
    // dd($users);
@endphp
                    @foreach($users as $key => $user)
                    {{-- {{dd($user)}} --}}
                    @if ($user['detail'])
                        <tr data-entry-id="{{ $user['detail']->user_id }}">
                            <td>
                                {{ $user['detail']->fullname ?? '' }}
                            </td>
                            <td>
                                @if ($user['salaryTemplate'])
                                    {{$user['salaryTemplate']->salary_grade}}
                                @else
                                    <span class="text-danger">Salary did not set yet</span>
                                @endif
                            </td>
                            <td>
                                {{'EGP '. number_format($user['salaryTemplate'] ? $user['salaryTemplate']->basic_salary : 0, 2)}}
                            </td>
                            <td>{{'EGP '. number_format($user['netSalary'] ?? 0, 2)}}</td>

                            <td>{{'EGP '. number_format($user['netSalary']/30 ?? 0, 2)}}</td>

                            <td>{{$user['totalAttendedDays']}}</td>

                            <td>{{$user['totalAbsentDays']}}</td>

                            <td>{{$holidays}}</td>

                            <td>{{$user['userVacations']}}</td>

                            <td>{{$user['totalDeductions']}}</td>
                            <td>{{$user['lateMinutes']}}</td>
                            <td>{{$user['extraMinutes']}}</td>

                            <td>{{'EGP '. number_format($user['netSalary'] - $user['totalDeductions'] ?? 0, 2)}}</td>

                            <td>
                                {{$date}}
                            </td>

                        </tr>
                    @endif
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


  $("#datepicker").datepicker( {
        format: "yyyy-mm",
        startView: "months",
        minViewMode: "months"
    });

})

</script>
@endsection
