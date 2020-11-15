@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.performanceIndicator.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.performance-indicators.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.id') }}
                        </th>
                        <td>
                            {{ $performanceIndicator->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.designation') }}
                        </th>
                        <td>
                            {{ $performanceIndicator->designation->designation_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.customer_technical_experience') }}
                        </th>
                        <td>
                            {{ App\Models\PerformanceIndicator::CUSTOMER_TECHNICAL_EXPERIENCE_SELECT[$performanceIndicator->customer_technical_experience] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.marketing') }}
                        </th>
                        <td>
                            {{ App\Models\PerformanceIndicator::MARKETING_SELECT[$performanceIndicator->marketing] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.management') }}
                        </th>
                        <td>
                            {{ App\Models\PerformanceIndicator::MANAGEMENT_SELECT[$performanceIndicator->management] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.administration') }}
                        </th>
                        <td>
                            {{ App\Models\PerformanceIndicator::ADMINISTRATION_SELECT[$performanceIndicator->administration] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.presentation_skill') }}
                        </th>
                        <td>
                            {{ App\Models\PerformanceIndicator::PRESENTATION_SKILL_SELECT[$performanceIndicator->presentation_skill] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.quantity_of_work') }}
                        </th>
                        <td>
                            {{ App\Models\PerformanceIndicator::QUANTITY_OF_WORK_SELECT[$performanceIndicator->quantity_of_work] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.efficiency') }}
                        </th>
                        <td>
                            {{ App\Models\PerformanceIndicator::EFFICIENCY_SELECT[$performanceIndicator->efficiency] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.integrity') }}
                        </th>
                        <td>
                            {{ App\Models\PerformanceIndicator::INTEGRITY_SELECT[$performanceIndicator->integrity] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.profissionalism') }}
                        </th>
                        <td>
                            {{ App\Models\PerformanceIndicator::PROFISSIONALISM_SELECT[$performanceIndicator->profissionalism] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.team_work') }}
                        </th>
                        <td>
                            {{ App\Models\PerformanceIndicator::TEAM_WORK_SELECT[$performanceIndicator->team_work] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.critical_thinking') }}
                        </th>
                        <td>
                            {{ App\Models\PerformanceIndicator::CRITICAL_THINKING_SELECT[$performanceIndicator->critical_thinking] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.conflict_management') }}
                        </th>
                        <td>
                            {{ App\Models\PerformanceIndicator::CONFLICT_MANAGEMENT_SELECT[$performanceIndicator->conflict_management] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.attendance') }}
                        </th>
                        <td>
                            {{ App\Models\PerformanceIndicator::ATTENDANCE_SELECT[$performanceIndicator->attendance] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performanceIndicator.fields.ability_to_meet_deadline') }}
                        </th>
                        <td>
                            {{ $performanceIndicator->ability_to_meet_deadline }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.performance-indicators.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection