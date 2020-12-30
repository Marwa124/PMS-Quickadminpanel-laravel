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

<department-list>
</department-list>


@endsection