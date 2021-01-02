@extends('layouts.admin')
@inject('attendanceModel', 'Modules\HR\Entities\Attendance')
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
                        {{-- <th>
                            {{ trans('cruds.attendances.fields.leave_application') }}
                        </th> --}}
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
                            foreach ($item as $val => $timeObject) {
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
                        <tr data-entry-id="{{ $key.'_'.$index }}" data-userId="{{$index}}">
                            <td>
                            </td>
                            <td>
                                {{ $item[0]->user->accountDetail->fullname ?? '' }}
                            </td>
                            <td class="attendance_clockIn clock_attendance">
                                {{ $clockIn ?? '' }}
                            </td>
                            <td class="attendance_clockOut clock_attendance">
                                {{ $clockOut ?? '' }}
                            </td>
                            <td class="attendance_day">
                                {{ $key ?? '' }}
                            </td>
                            <td>
                                {{-- @can('attendances_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.attendances.show', $attendances->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan --}}

                                {{-- @can('attendances_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('hr.admin.attendances.edit', $attendances->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan --}}

                                @can('attendances_delete')
                                    <form action="{{ route('hr.admin.attendances.destroy', [$idClockIn ?? ''.'.'.$idClockOut ?? '']) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                            {{-- Edit Clock in Modal --}}
                            @can('attendances_edit')
                            <!-- Modal -->
                            <div class="modal fade" id="fullName{{$idClockIn.'_'.$idClockOut}}" tabindex="-1" role="dialog" aria-labelledby="fullNameTitle{{$idClockIn.'_'.$idClockOut}}" aria-hidden="true">
                               <div class="modal-dialog modal-dialog-centered" role="document">
                                   <div class="modal-content">
                                       <div class="modal-body">
                                           <div class="form-group">
                                               <input type="text" class="form-control timepiker"
                                               value="" name="date">
                                           </div>

                                           <input type="button" class="btn btn-xs btn-primary updateUserFullname" value="Update"
                                           data-dismiss="" aria-label="Close">
                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           @endcan
                           {{-- End Edit Clock in Modal --}}

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
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
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

})



// Edit Clock Attendance Modal
$('.clock_attendance').click(function() {
    let day = $(this).closest('tr').find('.attendance_day').text();
    // let userId = $(this).closest('tr').attr('data-entry-id');
    let userId = $(this).closest('tr').attr('data-userId');
    // console.log(day.trim());
    console.log(userId);
})


</script>
@endsection
