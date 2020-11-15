@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vacation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vacations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vacation.fields.id') }}
                        </th>
                        <td>
                            {{ $vacation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacation.fields.name') }}
                        </th>
                        <td>
                            {{ $vacation->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacation.fields.description') }}
                        </th>
                        <td>
                            {!! $vacation->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacation.fields.start_date') }}
                        </th>
                        <td>
                            {{ $vacation->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacation.fields.end_date') }}
                        </th>
                        <td>
                            {{ $vacation->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacation.fields.location') }}
                        </th>
                        <td>
                            {{ $vacation->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacation.fields.color') }}
                        </th>
                        <td>
                            {{ $vacation->color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vacation.fields.user') }}
                        </th>
                        <td>
                            {{ $vacation->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vacations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection