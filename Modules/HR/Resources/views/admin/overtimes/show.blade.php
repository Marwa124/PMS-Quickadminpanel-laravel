@extends('layouts.admin')
@inject('overtimeModel', 'Modules\HR\Entities\Overtime')
@inject('accountDetailModel', 'Modules\HR\Entities\AccountDetail')

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.overtime.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.overtimes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.overtime.fields.id') }}
                        </th>
                        <td>
                            {{ $overtime->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.overtime.fields.user') }}
                        </th>
                        <td>
                            @php
                                $accountDetails = $accountDetailModel::where('user_id', $overtime->user->id)->select('fullname')->first();
                            @endphp
                            {{ $accountDetails->fullname ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.overtime.fields.overtime_date') }}
                        </th>
                        <td>
                            {{ $overtime->overtime_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.overtime.fields.overtime_hours') }}
                        </th>
                        <td>
                            {{ $overtime->overtime_hours }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.overtime.fields.notes') }}
                        </th>
                        <td>
                            {!! $overtime->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.overtime.fields.status') }}
                        </th>
                        <td>
                            {{ $overtimeModel::STATUS_SELECT[$overtime->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.overtimes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection