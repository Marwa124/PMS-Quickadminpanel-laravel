@extends('layouts.admin')
@section('content')
@inject('jobCircularModel', 'Modules\HR\Entities\JobCircular')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jobCircular.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.job-circulars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jobCircular.fields.id') }}
                        </th>
                        <td>
                            {{ $jobCircular->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobCircular.fields.name') }}
                        </th>
                        <td>
                            {{ $jobCircular->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobCircular.fields.designation') }}
                        </th>
                        <td>
                            {{ $jobCircular->designation->designation_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobCircular.fields.vacancy_no') }}
                        </th>
                        <td>
                            {{ $jobCircular->vacancy_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobCircular.fields.posted_date') }}
                        </th>
                        <td>
                            {{ $jobCircular->posted_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobCircular.fields.employment_type') }}
                        </th>
                        <td>
                            {{ $jobCircularModel::EMPLOYMENT_TYPE_SELECT[$jobCircular->employment_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobCircular.fields.experience') }}
                        </th>
                        <td>
                            {{ $jobCircular->experience }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobCircular.fields.age') }}
                        </th>
                        <td>
                            {{ $jobCircular->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobCircular.fields.salary_range') }}
                        </th>
                        <td>
                            {{ $jobCircular->salary_range }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobCircular.fields.last_date') }}
                        </th>
                        <td>
                            {{ $jobCircular->last_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobCircular.fields.description') }}
                        </th>
                        <td>
                            {!! $jobCircular->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobCircular.fields.status') }}
                        </th>
                        <td>
                            {{ $jobCircularModel::STATUS_SELECT[$jobCircular->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobCircular.fields.permissions') }}
                        </th>
                        <td>
                            @foreach($jobCircular->permissions as $key => $permissions)
                                <span class="label label-info">{{ $permissions->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.job-circulars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
