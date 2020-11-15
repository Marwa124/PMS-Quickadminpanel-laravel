@can('department_show')
    <a class="btn btn-xs btn-primary" href="{{ route('hr.admin.departments.show', $department_id) }}">
        {{ trans('global.view') }}
    </a>
@endcan

@can('department_edit')
    <a class="btn btn-xs btn-info" href="{{ route('hr.admin.departments.edit', $department_id) }}">
        {{ trans('global.edit') }}
    </a>
@endcan

@can('department_delete')
    <form action="{{ route('hr.admin.departments.destroy', $department_id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
    </form>
@endcan





<div class="card">
    <div class="card-header">
        {{ trans('cruds.department.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="display responsive nowrap table table-bordered table-striped table-hover datatable datatable-Department"  style="width:100%">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        {{-- <th>
                            {{ trans('cruds.department.fields.id') }}
                        </th> --}}
                        {{-- <th>
                            {{ trans('cruds.department.fields.designation_name') }}
                        </th> --}}
                        <th>
                            {{ trans('cruds.department.fields.user_name') }}
                        </th>
                        {{-- <th>
                            {{ trans('cruds.department.fields.unread_email') }}
                        </th> --}}
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="form_body_result">

@if ($department_head)
<tr class="bg-info">
    <td align="left" colspan="1">Department Head</td>
    <td align="center" colspan="3">{{$department_head->fullname}}</td>
</tr>
@else
<tr class="bg-link">
    <td align="left" colspan="1"></td>
    <td align="center" colspan="3" style="color:black;">No Data Found</td>
</tr>
@endif

@foreach($userAccounts as $key => $account)
    <?php $acountUser = $account->user()->first(); ?>
    <tr data-entry-id="{{ $account->id }}">
        <td>

        </td>
        <td>
            {{ $account->fullname ?? '' }}
        </td>
        <td>
            @can('department_show')
                {{-- <a class="btn btn-xs btn-primary" href="{{ route('hr.admin.employees.show', $acountUser->id) }}">

                    {{ trans('global.view') }}
                </a> --}}
            @endcan

            @can('department_edit')
                <a class="btn btn-xs btn-info" href="{{ route('hr.admin.employees.edit', $acountUser->id) }}">
                    {{ trans('global.edit') }}
                </a>
            @endcan

            @can('department_delete')
                <form action="{{ route('hr.admin.employees.destroy', $acountUser->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
