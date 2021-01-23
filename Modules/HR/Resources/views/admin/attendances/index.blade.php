@extends('layouts.admin')

@section('content')
@can('attendances_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('hr.admin.attendances.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.attendances.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.attendances.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-attendances">
                <thead>
                    <tr>
                        <th width="10">
                        </th>
                        <th>
                            {{ trans('cruds.attendances.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.attendances.fields.date_in') }}
                        </th>
                        <th>
                            {{ trans('cruds.attendances.fields.date_out') }}
                        </th>
                        <th>
                            Day
                        </th>
                        {{-- <th>
                            {{ trans('cruds.attendances.fields.attendance_status') }}
                        </th> --}}
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendances as $key => $attendance)
                    {{-- Get attendance Day --}}
                    @foreach ($attendance as $index => $item)
                    {{-- Get the min and max time clock  --}}
                        <?php
                            $clockIn = '';
                            $clockOut = '';
                            $idClockIn = '';
                            $idClockOut = '';
                            $fingerDate = '';
                            foreach ($item as $val => $timeObject) {
                                $fingerDate = $timeObject->date;
                                if (date($clockIn) > date($clockOut) ) {
                                    $clockOut = $timeObject->time;
                                    $idClockOut = $timeObject->id;
                                } else {
                                    $clockIn = $timeObject->time;
                                    $idClockIn = $timeObject->id;
                                }
                            }
                        ?>
                        {{-- <tr data-entry-id="{{ $idClockIn.'-'.$idClockOut }}"> --}}
                        <tr data-entry-id="{{ $fingerDate.'_'.$index }}" data-user-id="{{$index}}">
                            <td>
                            </td>
                            <td>
                                {{ $item[0]->user->accountDetail->fullname ?? '' }}
                            </td>
                            <td class="attendance_clockIn clock_attendance">
                                <div class="clockTime">
                                    {{ $clockIn ?? '' }}
                                </div>
                                @can('attendances_edit')
                                    <div class="form-group display"> {{-- Edit Clock --}}
                                        <input class="form-control" 
                                            type="time" name="date_in" id="date_in" value="{{ $clockIn ?? '' }}">
                                    </div>
                                @endcan
                            </td>
                            <td class="attendance_clockOut clock_attendance">
                                <div class="clockTime">
                                    {{ $clockOut ?? '' }}
                                </div>
                                @can('attendances_edit')
                                    <div class="form-group display"> {{-- Edit Clock --}}
                                        <input class="form-control" 
                                            type="time" name="date_out" id="date_out" value="{{ $clockOut ?? '' }}">
                                    </div>
                                @endcan

                            </td>
                            <td class="attendance_day">
                                {{ $key ?? '' }}
                            </td>
                            <td>

                                @can('attendances_delete')
                                    <form action="{{ route('hr.admin.attendances.destroy', $fingerDate.'_'.$index) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>

                        {{-- End Get the min and max time clock  --}}
                        @endforeach

                    {{-- End Get attendance Day --}}
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

    const getRowData = ids => {
        var arrayRowIds = [];
        var arrayRowUsers = [];
        ids.forEach(id => {
            var n = id.search("_");
            var user = id.substring(n+1);
            var date = id.substr(0, n);

            arrayRowIds.push(user)
            arrayRowUsers.push(date)
        });

        return [arrayRowIds, arrayRowUsers];
    }


  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('attendances_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('hr.admin.attendances.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });


       if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')
        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: {
                users: getRowData(ids)[0],
                ids: getRowData(ids)[1],
                _method: 'DELETE'
            }})
          .done(function (data) {
              for (let x = 0; x < data.ids.length; x++) {
                  $("tbody").find(`[data-entry-id='${data.ids[x]}_${data.users[x]}']`).remove();
              }
            })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-attendances:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });



  // Edit Clock Attendance Modal
  $('.clock_attendance').dblclick(function() {
      let day = $(this).closest('tr').find('.attendance_day').text().trim();
      // let userId = $(this).closest('tr').attr('data-entry-id');
      let userId = $(this).closest('tr').attr('data-user-id');
      let oldTimeValue = $(this).closest('td').find('.clockTime').html().trim();
    //   console.log(oldTimeValue);
      if ($(this).find('.form-group').length != 0) {
        $(this).find('.clockTime').toggleClass('display');
        $(this).find('.form-group').toggleClass('display');
        $(this).find('.form-group input').val();
        $(this).find('.form-group input').on('change', function (e) {
            let inputVal = $(this).val();
            let timeInput = $(this).closest('td').find('.clockTime');
            $.ajax({
                url: `attendances/${day}_${userId}`,
                method: 'put',
                data:{
                    _token: '{{csrf_token()}}',
                    oldTimeValue,
                    inputVal
                },
                success: function (res) {
                    // console.log(res);
                    timeInput.html(inputVal);
                }
            })
        })
      }

    //   console.log(userId);
  })

})






</script>
@endsection

@section('styles')
    <style>
        .display {
            display: none;
        }
    </style>
@endsection
