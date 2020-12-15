@extends('layouts.admin')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<style>
    .bg-red{
        background-color: red;
    }
</style>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.monthlyAttendance.title_singular') }} {{ trans('global.list') }}
    </div>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border d-flex justify-content-center">
                <h3 class="box-title">{{ __('Monthly Attendance') }} </h3>

            </div>
            <div class="box-body">
                <!-- /.Notification Box -->
                <div class="col-md-12">
                    <form action="{{ route('hr.admin.monthly-attendances.index') }}" method="get">
                        {{-- @csrf --}}
                        <div class="form-group m-auto d-flex justify-content-center">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="input-group margin">
                                    <div class="nav-link"><i class="fa fa-calendar"></i></div>
                                    <input type="text" class="form-control" name="date" id="datepicker" value="{{$date}}"/>


                                    <div class="nav-link"><i class="fa fa-user"></i></div>
                                    <?php
                                    if ($userRequest != '') {
                                        $selected_user = App\Models\User::where('id', $userRequest)->first()->accountDetail->fullname;
                                        }
                                    ?>
                                        <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                                        <option selected disabled >{{ $userRequest ? $selected_user : trans('cruds.monthlyAttendance.fields.select_user') }}</option>
                                            @foreach($userAccounts as $user)
                                            @if ($user)
                                                <option value="{{ $user->user_id }}" {{ ($userRequest ?? '') == $user->user_id ? 'selected' : '' }}>{{ $user->fullname }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @if($errors->has('user'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('user') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.clientMeeting.fields.user_helper') }}</span>



                                    <span class="input-group-btn">
                                      <button id="submit-date" type="submit" class="btn btn-info btn-flat"
                                      ><i class="icon fa fa-arrow-right"></i>{{ __('Go') }} </button>
                                  </span>
                              </div>
                            </div>
                        </div>
                  </form>
              </div>
              <!-- /. end col -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">

          </div>
          <!-- /.box-footer -->
      </div>
      <!-- /.box -->
  </section>
  <!-- /.content -->

<?php
// echo "<pre>";
// var_dump($userNames::all()->userAccountDetail-);
// die();
?>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-MonthlyAttendance">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.clock_in') }}
                        </th>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.clock_out') }}
                        </th>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.absence') }}
                        </th>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.vacation') }}
                        </th>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.holiday') }}
                        </th>
                        <th>
                            {{ trans('cruds.monthlyAttendance.fields.leave_request') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monthlyAttendances as $key => $monthlyAttendance)
                        <tr style="{{ $monthlyAttendance['weekEnd'] ? 'background-color:#f9b11599;' : '' }}">
                            <td>
                                {{ $monthlyAttendance['fingerDate'] ?? '' }} <br>
                                {{ $monthlyAttendance['dateName'] ?? '' }}
                            </td>
                            <td>
                                {{ $monthlyAttendance['clock_in'] ?? '' }}
                            </td>
                            <td>
                                {{ $monthlyAttendance['clock_out'] ?? '' }}
                            </td>
                            <td class="{{ $monthlyAttendance['absent'] ? 'bg-red' : ''  }}">
                                {{ $monthlyAttendance['absent'] ?? '' }}
                            </td>
                            <td>
                                {{ $monthlyAttendance['vacation'] ?? '' }}
                            </td>
                            <td>
                                {{ $monthlyAttendance['holiday'] ?? '' }}
                            </td>
                            <td>
                                {{ $monthlyAttendance['leave_request'] ?? '' }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

<script>
    $(function () {
        $("#datepicker").datepicker( {
            format: "yyyy-mm",
            startView: "months",
            minViewMode: "months"
        });

  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-MonthlyAttendance:not(.ajaxTable)').DataTable({
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

})

</script>
@endsection
