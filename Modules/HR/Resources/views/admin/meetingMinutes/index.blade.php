@extends('layouts.admin')
@section('content')
@inject('meetingMinute', 'Modules\HR\Entities\MeetingMinute')
@can('meeting_minute_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route('hr.admin.meeting-minutes.create') }}">
            {{ trans('global.add') }} {{ trans('cruds.meetingMinute.title_singular') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.meetingMinute.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-MeetingMinute">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.attendees') }}
                        </th>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.meetingMinute.fields.location') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($meetingMinutes as $key => $meetingMinute)
                    <tr data-entry-id="{{ $meetingMinute->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $meetingMinute->id ?? '' }}
                        </td>
                        <td>
                            {{ $meetingMinute->user->accountDetail->fullname ?? '' }}
                        </td>
                        <td>
                            {{ $meetingMinute->name ?? '' }}
                        </td>
                        <td>
                            @foreach ($meetingMinute->attendees as $item)
                            @php
                            $userName = App\Models\AccountDetail::where('user_id', $item)->pluck('fullname')->first();
                            @endphp
                            {{ $userName ?? '' }} <?php echo "</br>"; ?>
                            @endforeach
                        </td>
                        <td>
                            {{ $meetingMinute->start_date ?? '' }}
                        </td>
                        <td>
                            {{ $meetingMinute->end_date ?? '' }}
                        </td>
                        <td>
                            {{ $meetingMinute->location ?? '' }}
                        </td>
                        <td>
                            {{-- @can('meeting_minute_show')
                            <a class="btn btn-xs btn-primary"
                                href="{{ route('hr.admin.meeting-minutes.show', $meetingMinute->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan --}}

                            @can('meeting_minute_edit')
                            <a class="btn btn-xs btn-info"
                                href="{{ route('hr.admin.meeting-minutes.edit', $meetingMinute->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan

                            @can('meeting_minute_delete')
                            <form action="{{ route('hr.admin.meeting-minutes.destroy', $meetingMinute->id) }}"
                                method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                style="display: inline-block;">
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
    $(function() {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('meeting_minute_delete')
        let deleteButtonTrans = '{{ trans("global.datatables.delete") }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('hr.admin.meeting-minutes.massDestroy') }}",
            className: 'btn-danger',
            action: function(e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function(entry) {
                    return $(entry).data('entry-id')
                });
                if (ids.length === 0) {
                    alert('{{ trans('global.datatables.zero_selected') }}')
                    return
                }
                if (confirm('{{ trans('global.areYouSure ') }}')) {
                    $.ajax({
                            headers: {
                                'x-csrf-token': _token
                            },
                            method: 'POST',
                            url: config.url,
                            data: {
                                ids: ids,
                                _method: 'DELETE'
                            }
                        })
                        .done(function() {
                            location.reload()
                        })
                }
            }
        }
        dtButtons.push(deleteButton)
        @endcan
        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [
                [1, 'desc']
            ],
            pageLength: 25,
        });
        let table = $('.datatable-MeetingMinute:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
</script>
@endsection
