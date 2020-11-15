@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.leaveCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.leave-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $leaveCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $leaveCategory->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.leaveCategory.fields.leave_quota') }}
                        </th>
                        <td>
                            {{ $leaveCategory->leave_quota }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.leave-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#leave_category_leave_applications" role="tab" data-toggle="tab">
                {{ trans('cruds.leaveApplication.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="leave_category_leave_applications">
            @includeIf('admin.leaveCategories.relationships.leaveCategoryLeaveApplications', ['leaveApplications' => $leaveCategory->leaveCategoryLeaveApplications])
        </div>
    </div>
</div>

@endsection