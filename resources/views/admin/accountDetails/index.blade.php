@extends('layouts.admin')
@section('content')
@inject('salaryTemplateModel', 'Modules\Payroll\Entities\SalaryTemplate')
<div class="row">
    @can('account_detail_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.account-details.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.accountDetail.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div style="" class="row d-flex ml-auto">
        <div class="col-lg-12">
            <select data-column="0" class="form-control filter-select" name="" id="">
                <option value="0">Active Users</option>
                <option value="1">Unactive Users</option>
            </select>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.accountDetail.title_singular') }} {{ trans('global.list') }}
    </div>
    <div class="card-body">
        <div class="table-responsive" style="overflow-x: hidden !important;">
            <table class="display responsive nowrap table table-bordered table-striped table-hover datatable datatable-AccountDetail" style="width:100%">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.accountDetail.fields.avatar') }}
                        </th>
                        <th>
                            {{ trans('cruds.accountDetail.fields.fullname') }}
                        </th>
                        <th>
                            {{ trans('cruds.accountDetail.fields.email') }}
                        </th>
                        <th>
                            Role
                        </th>
                        <th>
                            {{ trans('cruds.accountDetail.fields.phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.accountDetail.fields.joining_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.accountDetail.fields.designation') }}
                        </th>
                        <th>
                            {{ trans('cruds.accountDetail.fields.department') }}
                        </th>
                        <th>
                            {{ trans('cruds.accountDetail.fields.salary') }}
                        </th>
                        {{-- <th>
                            {{ trans('cruds.accountDetail.fields.designation') }}
                        </th> --}}
                        {{-- <th>
                            {{ trans('cruds.accountDetail.fields.gender') }}
                        </th> --}}
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($accountDetails as $key => $accountDetail)
                    @if ($accountDetail)

                        <tr data-entry-id="{{ $accountDetail->id }}">
                            <td>

                            </td>
                            <td>
                                @if($accountDetail->avatar)
                                    <a href="{{ str_replace('storage', 'public/storage', $accountDetail->avatar->getUrl()) }}" target="_blank">
                                        <img class="rounded-circle img-thumbnail d-flex m-auto"
                                        src="{{ str_replace('storage', 'public/storage', $accountDetail->avatar->getUrl('thumb')) }}">
                                    </a>
                                    {{-- <a href="{{ $accountDetail->avatar->getUrl() }}" target="_blank">
                                        <img class="rounded-circle img-thumbnail d-flex m-auto"
                                        src="{{ $accountDetail->avatar->getUrl('thumb') }}">
                                    </a> --}}
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
                            </td>
                            <td>
                                {{ $accountDetail->fullname ?? '' }}
                            </td>
                            <td>
                                {{ $accountDetail->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $accountDetail->user->role()->first()->title ?? '' }}
                            </td>
                            <td>
                                {{ $accountDetail->mobile ?? '' }}
                            </td>
                            <td>
                                {{ $accountDetail->joining_date ?? '' }}
                            </td>
                            <td>
                                {{ $accountDetail->designation->designation_name ?? '' }}
                            </td>
                            <td>
                                {{-- {{dd($accountDetail->designation->department->department_name )}} --}}
                                {{ $accountDetail->designation->department->department_name ?? '' }}
                            </td>
                            <td>
                                <?php
                                    $designatonName = $accountDetail->designation;
                                    $salary = $designatonName ? $salaryTemplateModel::where('salary_grade', $designatonName->designation_name)->select('basic_salary')->first() : '';
                                ?>
                                {{-- {{dd($salaryTemplateModel::where('salary_grade', $designatonName)->select('basic_salary')->first()->basic_salary)}} --}}

                                {{  $salary ? 'EGY ' .number_format($salary->basic_salary, 0, ',', '.') : ''}}
                                {{-- {{ $salary ? $salary->basic_salary : '' }} --}}
                            </td>
                            {{-- <td>
                                {{ $accountDetail->designation->designation_name ?? '' }}
                            </td> --}}
                            {{-- <td>
                                {{ App\Models\AccountDetail::GENDER_RADIO[$accountDetail->gender] ?? '' }}
                            </td> --}}
                            <td>
                                @can('account_detail_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.account-details.show', $accountDetail->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('account_detail_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.account-details.edit', $accountDetail->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('account_detail_delete')
                                    <form action="{{ route('admin.account-details.destroy', $accountDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
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
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
// @can('account_detail_delete')
//   let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
//   let deleteButton = {
//     text: deleteButtonTrans,
//     url: "{{ route('admin.account-details.massDestroy') }}",
//     className: 'btn-danger',
//     action: function (e, dt, node, config) {
//       var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
//           return $(entry).data('entry-id')
//       });

//       if (ids.length === 0) {
//         alert('{{ trans('global.datatables.zero_selected') }}')

//         return
//       }

//       if (confirm('{{ trans('global.areYouSure') }}')) {
//         $.ajax({
//           headers: {'x-csrf-token': _token},
//           method: 'POST',
//           url: config.url,
//           data: { ids: ids, _method: 'DELETE' }})
//           .done(function () { location.reload() })
//       }
//     }
//   }
//   dtButtons.push(deleteButton)
// @endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
    scrollX : false,
  });
  let table = $('.datatable-AccountDetail:not(.ajaxTable)').DataTable({
        buttons: [dtButtons, 'colvis'],
    })

  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

  $(".filter-select").change(function(){
// console.log($(this).val());
    $.ajax({
        // headers: {'x-csrf-token': _token},
        type: 'GET',
        url: "{{route('admin.account-details.index')}}",
        dataType: 'html',
        data: {
            selectFilter: $(this).val(),
        },
        success: function(data){
            // console.log(data);
            $('tbody').html(data)
        }
    })

  })



})

</script>
@endsection
