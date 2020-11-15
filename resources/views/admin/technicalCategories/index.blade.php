@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.technicalCategory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TechnicalCategory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.technicalCategory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.technicalCategory.fields.beginner') }}
                        </th>
                        <th>
                            {{ trans('cruds.technicalCategory.fields.intermediate') }}
                        </th>
                        <th>
                            {{ trans('cruds.technicalCategory.fields.advanced') }}
                        </th>
                        <th>
                            {{ trans('cruds.technicalCategory.fields.expert_leader') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($technicalCategories as $key => $technicalCategory)
                        <tr data-entry-id="{{ $technicalCategory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $technicalCategory->id ?? '' }}
                            </td>
                            <td>
                                {{ $technicalCategory->beginner ?? '' }}
                            </td>
                            <td>
                                {{ $technicalCategory->intermediate ?? '' }}
                            </td>
                            <td>
                                {{ $technicalCategory->advanced ?? '' }}
                            </td>
                            <td>
                                {{ $technicalCategory->expert_leader ?? '' }}
                            </td>
                            <td>
                                @can('technical_category_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.technical-categories.show', $technicalCategory->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
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
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-TechnicalCategory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection