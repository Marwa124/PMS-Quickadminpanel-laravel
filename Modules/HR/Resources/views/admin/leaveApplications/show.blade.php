@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.leaveApplication.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.leave-applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.id') }}
                        </th>
                        <td>
                            {{ $leaveApplication->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.user') }}
                        </th>
                        <td>
                            {{ $leaveApplication->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.leave_category') }}
                        </th>
                        <td>
                            {{ $leaveApplication->leave_category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.reason') }}
                        </th>
                        <td>
                            {!! $leaveApplication->reason !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.leave_type') }}
                        </th>
                        <td>
                            {{ Modules\HR\Entities\LeaveApplication::LEAVE_TYPE_SELECT[$leaveApplication->leave_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.hours') }}
                        </th>
                        <td>
                            {{ $leaveApplication->hours }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.leave_start_date') }}
                        </th>
                        <td>
                            {{ $leaveApplication->leave_start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.leave_end_date') }}
                        </th>
                        <td>
                            {{ $leaveApplication->leave_end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.application_status') }}
                        </th>
                        <td>
                            {{ Modules\HR\Entities\LeaveApplication::APPLICATION_STATUS_SELECT[$leaveApplication->application_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.view_status') }}
                        </th>
                        <td>
                            {{ $leaveApplication->view_status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.attachments') }}
                        </th>
                        <td>
                            @if($leaveApplication->attachments)
                                {{-- <a href="{{ $leaveApplication->attachments->getUrl() }}" target="_blank"> --}}
                                <a href="{{ $attachment }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.comments') }}
                        </th>
                        <td>
                            {!! $leaveApplication->comments !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveApplication.fields.approved_by') }}
                        </th>
                        <td>
                            {{ $leaveApplication->approved_by }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.leave-applications.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
