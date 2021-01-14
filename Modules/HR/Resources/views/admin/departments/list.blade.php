@extends('layouts.admin')

@section('content')

@can('department_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">

            <a class="btn btn-success" href="{{ route('hr.admin.departments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.department.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<department-list
    :can-edit="{{auth()->user()->can('department_edit')}}"
    :can-delete="{{auth()->user()->can('department_delete')}}"
    :lang-key={{json_encode(app()->getLocale())}}
>
</department-list>


@endsection