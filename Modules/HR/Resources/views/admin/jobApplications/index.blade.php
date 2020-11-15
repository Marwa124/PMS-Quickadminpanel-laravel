@extends('layouts.admin')
@section('content')
@inject('jobApplicationModel', 'Modules\HR\Entities\JobApplication')
@inject('jobCircularModel', 'Modules\HR\Entities\JobCircular')

{{-- @can('job_application_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('front.job-applications.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.jobApplication.title_singular') }}
            </a>
        </div>
    </div>
@endcan --}}
<div class="card">
    <div class="card-header">
        {{ trans('cruds.jobApplication.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-JobApplication">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        {{-- <th>
                            {{ trans('cruds.jobApplication.fields.id') }}
                        </th> --}}
                        <th>
                            {{ trans('cruds.jobApplication.fields.job_circular') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobApplication.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobApplication.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobApplication.fields.mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobApplication.fields.application_status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($jobCircularModel::all() as $key => $item)
                                    <option value="{{ $item->name }}" {{($circularId == $key) ? 'selected' : ''}}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($jobApplicationModel::APPLICATION_STATUS_SELECT as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobApplications as $key => $jobApplication)
                        <tr data-entry-id="{{ $jobApplication->id }}">
                            <td>

                            </td>
                            {{-- <td>
                                {{ $jobApplication->id ?? '' }}
                            </td> --}}
                            <td>
                                {{ $jobApplication->job_circular->name ?? '' }}
                            </td>
                            <td>
                                {{ $jobApplication->name ?? '' }}
                            </td>
                            <td>
                                {{ $jobApplication->email ?? '' }}
                            </td>
                            <td>
                                {{ $jobApplication->mobile ?? '' }}
                            </td>
                            <td class="text-center" style="color:#fff; background-color: {{ $jobApplicationModel::STATUS_COLOR[$jobApplication->application_status] ?? 'none' }};">
                                {{ $jobApplicationModel::APPLICATION_STATUS_SELECT[$jobApplication->application_status] ?? '' }}
                            </td>
                            <td>
                                @can('job_application_show')
                                    @if ($jobApplication->resume)
                                        <a target="_blank" class="btn btn-xs btn-secondary download_resume" href="{{str_replace('public/storage', 'storage/app/public', $jobApplication->resume->getUrl())}}">
                                            <i class="fas fa-cloud-download-alt"></i>
                                        </a>
                                    @endif
                                    {{-- <a class="btn btn-xs btn-primary" href="{{ route('hr.admin.job-applications.show', $jobApplication->id) }}">
                                        {{ trans('global.view') }}
                                    </a> --}}
                                @endcan

                                @can('job_application_edit')
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn-xs btn-success changeStatusBtn" data-toggle="modal" data-target="#changeStatus">
                                        Change Status
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal-sm fade"
                                        style="z-index: 9999; position: absolute; margin: auto;
                                        width: 100%; left: calc(100% - 70%);"
                                    id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="changeStatusLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <select class="form-control" name="application_status" id="application_status">
                                                    <option value disabled {{ old('application_status', $jobApplicationModel::APPLICATION_STATUS_SELECT[$jobApplication->application_status] ?? '') === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                    @foreach($jobApplicationModel::APPLICATION_STATUS_SELECT as $key => $label)
                                                        <option value="{{ $key }}" {{ old('application_status', 'pending') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                            <button type="button" class="btn-sm btn-primary">Update</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>










                                    {{-- <a class="btn btn-xs btn-info" href="{{ route('hr.admin.job-applications.edit', $jobApplication->id) }}">
                                        {{ trans('global.edit') }}
                                    </a> --}}
                                @endcan

                                @can('job_application_delete')
                                    <form action="{{ route('hr.admin.job-applications.destroy', $jobApplication->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
      $('.modal-sm').css('display', 'none');

  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('job_application_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('hr.admin.job-applications.massDestroy') }}",
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
  let table = $('.datatable-JobApplication:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });

  $('#changeStatusBtn').click(function() {
      $('.changeStatus').css('display', 'block');
  })

})

</script>
@endsection
