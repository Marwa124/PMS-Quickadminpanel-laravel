@extends('layouts.admin')
@section('title')
| {{ trans('cruds.salaryPaymentDetail.title_singular') }}
@endsection
@section('content')
@inject('salaryTemplateModel', 'Modules\Payroll\Entities\SalaryTemplate')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.salaryPaymentDetail.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-SalaryPaymentDetail">
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
                            {{ trans('cruds.salaryPaymentDetail.fields.overtime') }}
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
                                $salaryTemplate = $detail->designation->salaryTemplate()->first();
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
                                    {{ $salaryTemplate ? $salaryTemplate->salary_grade : '' }}
                                </td>
                                <td>
                                    {{'EGP '.number_format($salaryTemplate ? $salaryTemplate->basic_salary : 0, 2)}}
                                    {{-- {{ $salaryTemplate ? $salaryTemplate->basic_salary : '' }} --}}
                                </td>
                                <td>
                                    {{ $salaryTemplate ? $salaryTemplate->overtime_salary : '' }}
                                </td>
                                <td>
                                    @can('salary_payment_detail_show')
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#showModal{{$detail->user_id}}">
                                        {{ trans('global.show') }}
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
                                                            <a href="{{ $detail->avatar->getUrl() }}" target="_blank">
                                                                <img class="rounded-circle img-thumbnail d-flex m-auto"
                                                                src="{{ $detail->avatar->getUrl('thumb') }}">
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
                                                        {{-- <hr> --}}
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
  let table = $('.datatable-SalaryPaymentDetail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });


  $('.btnprn').printPage();



    // $('.print_modal_btn').on('click', function(){
    //     console.log("sdfjghk");
    //     var printcontent = $('.print_modal_btn').closest('.showDetailsModal');
    //     var restorepage = $('body').html();
    //     $('body').empty().html(printcontent);
    //         window.print();
    //         $('body').html(restorepage);

    // })
})

</script>
@endsection
