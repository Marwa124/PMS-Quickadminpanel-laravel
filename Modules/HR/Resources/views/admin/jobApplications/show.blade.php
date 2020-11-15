@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jobApplication.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.id') }}
                        </th>
                        <td>
                            {{ $jobApplication->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.job_circular') }}
                        </th>
                        <td>
                            {{ $jobApplication->job_circular->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.name') }}
                        </th>
                        <td>
                            {{ $jobApplication->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.email') }}
                        </th>
                        <td>
                            {{ $jobApplication->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.mobile') }}
                        </th>
                        <td>
                            {{ $jobApplication->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.cover_letter') }}
                        </th>
                        <td>
                            {!! $jobApplication->cover_letter !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.resume') }}
                        </th>
                        <td>
                            @if($jobApplication->resume)
                                <a href="{{ $jobApplication->resume->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.application_status') }}
                        </th>
                        <td>
                            {{ App\Models\JobApplication::APPLICATION_STATUS_SELECT[$jobApplication->application_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.apply_date') }}
                        </th>
                        <td>
                            {{ $jobApplication->apply_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.send_email') }}
                        </th>
                        <td>
                            {{ $jobApplication->send_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobApplication.fields.interview_date') }}
                        </th>
                        <td>
                            {{ $jobApplication->interview_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection