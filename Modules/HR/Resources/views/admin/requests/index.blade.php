@extends('layouts.admin')
@section('content')
@inject('clientMeetingModel', 'Modules\HR\Entities\ClientMeeting')
@inject('accountDetailModel', 'Modules\HR\Entities\AccountDetail')

@can('employee_request_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('hr.admin.requests.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.clientMeeting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.clientMeeting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="message">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <!-- <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ClientMeeting"> -->
            <table class=" table table-bordered table-striped table-hover datatable datatable-ClientMeeting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.day') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.from_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.to_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.comments') }}
                        </th>
                        <th>
                            {{ trans('cruds.clientMeeting.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientMeetingModel::all() as $key => $meeting)

                        <tr data-entry-id="{{ $meeting->id }}">
                            <td>

                            </td>
                            <td>
                                @foreach ($meeting->users as $item)
                                @php
                                $userName = $accountDetailModel::where('user_id', $item)->pluck('fullname')->first();
                                @endphp
                                {{ $userName ?? '' }} <?php echo "</br>"; ?>
                                @endforeach
                            </td>
                            <td>
                                {{ $meeting->day ?? '' }}
                            </td>
                            <td>
                                {{ $meeting->from_time ?? '' }}
                            </td>
                            <td>
                                {{ $meeting->to_time ?? '' }}
                            </td>
                            <td>
                                {{ $meeting->comments ?? '' }}
                            </td>
                            <td style="background-color: {{ $clientMeetingModel::STATUS_COLOR[$meeting->status] ?? 'none' }};">
                                {{ $clientMeetingModel::STATUS_SELECT[$meeting->status] ?? '' }}
                            </td>
                            <td>
                                @can('employee_request_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('hr.admin.requests.show', $meeting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('employee_request_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('hr.admin.requests.edit', $meeting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('employee_request_delete')
                                    <form action="{{ route('hr.admin.requests.destroy', $meeting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

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
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('employee_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('hr.admin.requests.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    // ajax: "{{ route('hr.admin.requests.index') }}",
    // columns: [
    //     { data: 'placeholder', name: 'placeholder' },
    //     { data: 'id', name: 'id' },
    //     { data: 'day', name: 'day' },
    //     { data: 'status', name: 'status' },
    //     { data: 'from_time', name: 'from_time' },
    //     { data: 'to_time', name: 'to_time' },
    //     // { data: 'user.name', name: 'user.name' },
    //     { data: 'comments', name: 'comments' },
    //     { data: 'actions', name: '{{ trans('global.actions') }}' }
    // ],
    // createdRow: (row, data, dataIndex, cells) => {
    //     $(cells[4]).css('background-color', data.status_color)
    //     // $(row).css('background-color', data.status_color)
    // }
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
//   let table = $('.datatable-ClientMeeting').DataTable(dtOverrideGlobals);
  let table = $('.datatable-ClientMeeting:not(.ajaxTable)').DataTable({ buttons: dtButtons });
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

  $('.message').delay(3000).slideUp(800);

});

</script>
@endsection
