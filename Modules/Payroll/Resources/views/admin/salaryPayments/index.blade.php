@extends('layouts.admin')
@section('content')
@inject('salaryTemplateModel', 'Modules\Payroll\Entities\SalaryTemplate')
@inject('salaryDeductionModel', 'Modules\Payroll\Entities\SalaryDeduction')
@inject('salaryPaymentModel', 'Modules\Payroll\Entities\SalaryPayment')
@inject('departmentModel', 'Modules\HR\Entities\Department')


@can('salary_payment_show')
<!-- Search -->

<div class="card">
    <h5 class="card-header">Make Payment</h5>
    <form action="{{ route('payroll.admin.salary-payments.index') }}" method="get">
        {{-- @csrf --}}
        <div class="card-body">
            <div class="">
                <div class="form-group d-flex justify-content-center">
                    <label for="department_id" class="required mr-2">Select Department</label>
                    <?php
                    if ($departmentRequest != '') {
                        $selected_department = $departmentModel::where('id', $departmentRequest)->first()->departmant_name;
                    }
                    $departments = $departmentModel->where('department_name', '!=', 'CEO')->where('department_name', '!=', 'Board Members')->pluck('department_name', 'id');
                    ?>
                    <select class="form-control select2 w-50" name="department_id" id="department_id" required>
                        {{-- trans('cruds.monthlyAttendance.fields.select_user') --}}
                        <option selected disabled >{{ $departmentRequest ? $selected_department :  'Select Department'}}</option>
                        @foreach($departments as $key => $department)
                            <option value="{{ $key }}" {{ ($departmentRequest ?? '') == $key ? 'selected' : '' }}>{{ $department }}</option>
                        @endforeach
                    </select>


                </div>
            </div>
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
        {{ trans('cruds.salaryPayment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SalaryPayment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.salaryPaymentDetail.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPaymentDetail.fields.salary_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPaymentDetail.fields.basic_salary') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.net_salary') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.details') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryPayment.fields.status') }}
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $detail)
                    @if ($detail)
                    <?php
                        $salaryTemplate = '';
                        $designation = $detail->designation()->first();
                        if ($designation) {
                            $salaryTemplate = $salaryTemplateModel->where('salary_grade', $designation->designation_name)->first();
                            $departmentName = $detail->designation->department()->select('department_name')->first();
                        }
                    ?>
                        <tr data-entry-id="{{ $detail->user_id }}">
                            <td>

                            </td>
                            <td>
                                {{ $detail->fullname ?? '' }}
                            </td>
                            <td>
                                @if ($salaryTemplate)
                                    {{$salaryTemplate->salary_grade}}
                                @else
                                    <span class="text-danger">Salary did not set yet</span>
                                @endif
                            </td>
                            <td>
                                {{number_format($salaryTemplate ? $salaryTemplate->basic_salary : 0, 2)}}
                            </td>
                            <?php
                            $netSalary = 0;
                            if ($salaryTemplate) {
                                $salaryDeduction = $salaryDeductionModel->where('salary_template_id', $salaryTemplate->id)->sum('value');
                                $netSalary = (int) ($salaryTemplate->basic_salary) - (int) $salaryDeduction;
                            }
                            ?>
                            <td>{{number_format($netSalary ?? 0, 2)}}</td>
                            <td>
                                @can('salary_payment_show')

                                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#showModal{{$detail->user_id}}">
                                    <i class="fa fa-list-alt"></i>
                                </button>
                                    <!-- Modal -->
                                    <div class="modal fade showDetailsModal" id="showModal{{$detail->user_id}}" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="showModalLabel">{{ trans('cruds.salaryPaymentDetail.title_singular') }}</h5>
                                            <div class="d-flex">
                                                <a href="{{route('payroll.admin.salary-employee-details-pdf', $detail->user_id)}}" class="btn btn-danger btn-xs mr-2"
                                                data-toggle="tooltip" data-placement="top" data-original-title="PDF">
                                                    <i class="fa fa-file-pdf-o"></i>
                                                </a>
                                                <a href="{{ route('payroll.admin.salary-employee-details-print', $detail->user_id) }}" class="btnprn btn btn-primary btn-xs">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                            </div>

                                            </div>
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-5 d-flex justify-content-center align-self-center">
                                                    @if($detail->avatar )
                                                        {{-- <a href="{{ str_replace('storage', 'public/storage', $detail->avatar->getUrl()) }}" target="_blank">
                                                            <img class="rounded-circle img-thumbnail d-flex m-auto"
                                                            src="{{ str_replace('storage', 'public/storage', $detail->avatar->getUrl('thumb')) }}">
                                                        </a> --}}
                                                        <a href="{{ str_replace('storage', 'storage/app/public', $detail->avatar->getUrl()) }}" target="_blank">
                                                            <img class="rounded-circle img-thumbnail d-flex m-auto"
                                                            src="{{ str_replace('storage', 'storage/app/public', $detail->avatar->getUrl('thumb')) }}">
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0)" style="display: inline-block">
                                                            <img class="rounded-circle img-thumbnail"
                                                            style="display: block;
                                                                margin-left: auto;
                                                                margin-right: auto;
                                                                width: 30%;"
                                                            src="{{ asset('images/default.png') }}">
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="col-md-7">
                                                    <h4 class="font-weight-bold">{{$detail->fullname}}</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-5">EMP ID: </div>
                                                        <div class="col-md-7">{{ $detail->employment_id }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5">Departments: </div>
                                                        <div class="col-md-7"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5">Designation: </div>
                                                        <div class="col-md-7">{{ $salaryTemplate ? $salaryTemplate->salary_grade : '' }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-5">Joining Date: </div>
                                                        <div class="col-md-7">{{ $detail->joining_date }}</div>
                                                    </div>
                                                </div>
                                            </div><!--Row End-->
                                            <div class="modal-header" style="border-color: tomato;">
                                                <h5 class="modal-title">Salary Detail</h5>
                                            </div>
                                            <div class="d-flex">
                                                <div class="font-weight-bold m-auto">Salary Grades</div>
                                                <div class="m-auto">{{ $salaryTemplate ? $salaryTemplate->salary_grade : '' }}</div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="font-weight-bold m-auto">{{ trans('cruds.salaryPaymentDetail.fields.basic_salary') }}</div>
                                                <span class="m-auto">{{'EGP '.number_format($salaryTemplate ? $salaryTemplate->basic_salary : 0, 2)}}</span>
                                            </div>
                                            <div class="d-flex">
                                                <div class="font-weight-bold m-auto">{{ trans('cruds.salaryPaymentDetail.fields.overtime') }}</div>
                                                <span class="m-auto"></span>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary btn-xs">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                @endcan

                            </td>
                            <?php
                                $salaryPayment = $salaryPaymentModel->where('payment_month', date('Y-m'))->where('user_id', $detail->user_id)->first();
                            ?>
                            <td>
                                @if ($salaryPayment)
                                    <span class="bg-success p-1 fa-xs font-weight-bold" style="border-radius:4px;">Paid</span>
                                @else
                                    <span class="bg-danger p-1 fa-xs font-weight-bold" style="border-radius:4px;">Unpaid</span>
                                @endif
                            </td>

                            <td>
                                @if ($salaryPayment && $salaryTemplate)
                                    @can('salary_payment_create')
                                        <a class="text-success" href="{{ route('payroll.admin.salary-payments.payslipGenerate', $date.'&'.$departmentRequest.'&'.$detail->user_id) }}">
                                            {{ trans('cruds.salaryPayment.fields.generate_payslip') }}
                                        </a>
                                    @endcan
                                @elseif($salaryTemplate)
                                    @can('salary_payment_create')
                                        <a class="text-danger" href="{{ route('payroll.admin.salary-payments.create', $date.'&'.$departmentRequest.'&'.$detail->user_id) }}">
                                            {{ trans('cruds.salaryPayment.fields.make_payment') }}
                                        </a>
                                    @endcan
                                @else()
                                    @can('salary_payment_create')
                                        <a class="text-warning" href="{{ route('hr.admin.account-details.edit', $detail->id) }}">
                                            Set Salary as designation
                                        </a>
                                    @endcan
                                @endif
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
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-SalaryPayment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });


  $("#datepicker").datepicker( {
        format: "yyyy-mm",
        startView: "months",
        minViewMode: "months"
    });

})

</script>
@endsection
