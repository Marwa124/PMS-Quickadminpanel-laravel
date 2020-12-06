@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.vacation.title_singular') }} {{ trans('global.list') }}
    </div>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border d-flex justify-content-center">
                <h3 class="box-title">{{ __('Daily Attendance') }} </h3>

            </div>
            <div class="box-body">
                <!-- /.Notification Box -->
                <div class="col-md-12">
                    <form action="{{ route('hr.admin.daily-attendances.index') }}" method="get">
                        {{-- @csrf --}}
                        <div class="form-group m-auto d-flex justify-content-center">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="input-group margin">
                                    <div class="nav-link"><i class="fa fa-calendar"></i></div>
                                    <input class="form-control date" type="text" name="date" id="datepicker" value="{{ $date }}" required>
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

    <div class="card-body" id="table-daily-attendance">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-DailyAttendance">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.dailyAttendance.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.dailyAttendance.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.dailyAttendance.fields.clock_in') }}
                        </th>
                        <th>
                            {{ trans('cruds.dailyAttendance.fields.clock_out') }}
                        </th>
                        <th>
                            {{ trans('cruds.dailyAttendance.fields.absent') }}
                        </th>
                        <th>
                            {{ trans('cruds.dailyAttendance.fields.vacation') }}
                        </th>
                        <th>
                            {{ trans('cruds.dailyAttendance.fields.holiday') }}
                        </th>
                        <th>
                            Leave Details
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fingerprintAttendances as $key => $dailyAttendance)
                    @if ($dailyAttendance != null)
                    {{-- {{dd($dailyAttendance)}} --}}
                    <tr data-entry-id="{{ $dailyAttendance['id'] }}" data-user-id="{{ $dailyAttendance['user_id'] ?? '' }}">
                        {{-- <input type="integer" class="hidden_user_id" value="{{ $dailyAttendance['user_id'] ?? '' }}" hidden> --}}
                        <td>
                            {{ $dailyAttendance['user_id'] ?? '' }}
                        </td>
                        <td>
                            <a href="{{route('hr.admin.account-details.show', $dailyAttendance['user_account_id'])}}" class="user_name">
                                {{ $dailyAttendance['name'] ?? '' }}
                            </a>
                        </td>
                        <td>
                            {{-- {{ $dailyAttendance->clock_in ?? '' }} --}}
                            {{ $dailyAttendance['clock_in'] ?? '' }}
                        </td>
                        <td>
                            {{ $dailyAttendance['clock_out'] ?? '' }}
                        </td>
                        <td>
                            {{ $dailyAttendance['absent'] ?? '' }}
                        </td>
                        <td>
                            {{ $dailyAttendance['vacation'] ?? '' }}
                        </td>
                        <td>
                            {{ $dailyAttendance['holiday'] ?? '' }}
                        </td>
                        <td>
                            <!-- Leave Details modal -->
                            <button type="button" class="btn btn-primary btn-xs leaveDetails" data-toggle="modal" data-target="#leavesDetails{{$dailyAttendance['user_id'] ?? ''}}">
                                <i class="fas fa-clipboard-list"></i>
                            </button>
                            <div class="leaveDetailsModal"></div>
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
  let table = $('.datatable-DailyAttendance:not(.ajaxTable)').DataTable({
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


    $('.leaveDetailsModal').html(``);


    //Leave User Details Redirect Btn to modal blade
    $('.leaveDetails').click(function(){
        let userId   = $(this).closest("tr").attr("data-user-id");
        let userName = $(this).closest('tr').find('.user_name').text();
        let str = $('input[name="date"]').val();
        var date = str.substr(0, 7);

        // console.log($(this).closest("tr").attr("data-user-id"));
        var e = $(this);
        $.ajax({
            url: '{{route("hr.admin.leave-applications.details")}}',
            type:'get',
            dataType: 'html',
            data: {
                user_id:   userId,
                user_name: userName,
                date: date,
            },
            success: function(res){
                e.closest('td').find('.leaveDetailsModal').html(res);

                $('#leavesDetails'+userId).modal('toggle');
            }
        })
    });

})

</script>
@endsection
