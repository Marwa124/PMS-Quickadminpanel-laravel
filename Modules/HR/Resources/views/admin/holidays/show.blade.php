@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.holiday.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.holidays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.id') }}
                        </th>
                        <td>
                            {{ $holiday->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.name') }}
                        </th>
                        <td>
                            {{ $holiday->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.description') }}
                        </th>
                        <td>
                            {{ $holiday->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.start_date') }}
                        </th>
                        <td>
                            {{ $holiday->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.end_date') }}
                        </th>
                        <td>
                            {{ $holiday->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.user') }}
                        </th>
                        <td>
                            {{ $holiday->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.holidays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection