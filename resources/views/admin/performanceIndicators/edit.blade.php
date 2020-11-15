@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.performanceIndicator.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.performance-indicators.update", [$performanceIndicator->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="designation_id">{{ trans('cruds.performanceIndicator.fields.designation') }}</label>
                <select class="form-control select2 {{ $errors->has('designation') ? 'is-invalid' : '' }}" name="designation_id" id="designation_id" required>
                    @foreach($designations as $id => $designation)
                        <option value="{{ $id }}" {{ (old('designation_id') ? old('designation_id') : $performanceIndicator->designation->id ?? '') == $id ? 'selected' : '' }}>{{ $designation }}</option>
                    @endforeach
                </select>
                @if($errors->has('designation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('designation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.designation_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performanceIndicator.fields.customer_technical_experience') }}</label>
                <select class="form-control {{ $errors->has('customer_technical_experience') ? 'is-invalid' : '' }}" name="customer_technical_experience" id="customer_technical_experience">
                    <option value disabled {{ old('customer_technical_experience', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PerformanceIndicator::CUSTOMER_TECHNICAL_EXPERIENCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('customer_technical_experience', $performanceIndicator->customer_technical_experience) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer_technical_experience'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_technical_experience') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.customer_technical_experience_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performanceIndicator.fields.marketing') }}</label>
                <select class="form-control {{ $errors->has('marketing') ? 'is-invalid' : '' }}" name="marketing" id="marketing">
                    <option value disabled {{ old('marketing', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PerformanceIndicator::MARKETING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('marketing', $performanceIndicator->marketing) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('marketing'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marketing') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.marketing_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performanceIndicator.fields.management') }}</label>
                <select class="form-control {{ $errors->has('management') ? 'is-invalid' : '' }}" name="management" id="management">
                    <option value disabled {{ old('management', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PerformanceIndicator::MANAGEMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('management', $performanceIndicator->management) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('management'))
                    <div class="invalid-feedback">
                        {{ $errors->first('management') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.management_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performanceIndicator.fields.administration') }}</label>
                <select class="form-control {{ $errors->has('administration') ? 'is-invalid' : '' }}" name="administration" id="administration">
                    <option value disabled {{ old('administration', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PerformanceIndicator::ADMINISTRATION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('administration', $performanceIndicator->administration) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('administration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('administration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.administration_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performanceIndicator.fields.presentation_skill') }}</label>
                <select class="form-control {{ $errors->has('presentation_skill') ? 'is-invalid' : '' }}" name="presentation_skill" id="presentation_skill">
                    <option value disabled {{ old('presentation_skill', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PerformanceIndicator::PRESENTATION_SKILL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('presentation_skill', $performanceIndicator->presentation_skill) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('presentation_skill'))
                    <div class="invalid-feedback">
                        {{ $errors->first('presentation_skill') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.presentation_skill_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performanceIndicator.fields.quantity_of_work') }}</label>
                <select class="form-control {{ $errors->has('quantity_of_work') ? 'is-invalid' : '' }}" name="quantity_of_work" id="quantity_of_work">
                    <option value disabled {{ old('quantity_of_work', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PerformanceIndicator::QUANTITY_OF_WORK_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('quantity_of_work', $performanceIndicator->quantity_of_work) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('quantity_of_work'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity_of_work') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.quantity_of_work_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performanceIndicator.fields.efficiency') }}</label>
                <select class="form-control {{ $errors->has('efficiency') ? 'is-invalid' : '' }}" name="efficiency" id="efficiency">
                    <option value disabled {{ old('efficiency', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PerformanceIndicator::EFFICIENCY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('efficiency', $performanceIndicator->efficiency) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('efficiency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('efficiency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.efficiency_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performanceIndicator.fields.integrity') }}</label>
                <select class="form-control {{ $errors->has('integrity') ? 'is-invalid' : '' }}" name="integrity" id="integrity">
                    <option value disabled {{ old('integrity', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PerformanceIndicator::INTEGRITY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('integrity', $performanceIndicator->integrity) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('integrity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('integrity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.integrity_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performanceIndicator.fields.profissionalism') }}</label>
                <select class="form-control {{ $errors->has('profissionalism') ? 'is-invalid' : '' }}" name="profissionalism" id="profissionalism">
                    <option value disabled {{ old('profissionalism', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PerformanceIndicator::PROFISSIONALISM_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('profissionalism', $performanceIndicator->profissionalism) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('profissionalism'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profissionalism') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.profissionalism_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performanceIndicator.fields.team_work') }}</label>
                <select class="form-control {{ $errors->has('team_work') ? 'is-invalid' : '' }}" name="team_work" id="team_work">
                    <option value disabled {{ old('team_work', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PerformanceIndicator::TEAM_WORK_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('team_work', $performanceIndicator->team_work) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('team_work'))
                    <div class="invalid-feedback">
                        {{ $errors->first('team_work') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.team_work_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performanceIndicator.fields.critical_thinking') }}</label>
                <select class="form-control {{ $errors->has('critical_thinking') ? 'is-invalid' : '' }}" name="critical_thinking" id="critical_thinking">
                    <option value disabled {{ old('critical_thinking', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PerformanceIndicator::CRITICAL_THINKING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('critical_thinking', $performanceIndicator->critical_thinking) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('critical_thinking'))
                    <div class="invalid-feedback">
                        {{ $errors->first('critical_thinking') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.critical_thinking_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performanceIndicator.fields.conflict_management') }}</label>
                <select class="form-control {{ $errors->has('conflict_management') ? 'is-invalid' : '' }}" name="conflict_management" id="conflict_management">
                    <option value disabled {{ old('conflict_management', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PerformanceIndicator::CONFLICT_MANAGEMENT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('conflict_management', $performanceIndicator->conflict_management) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('conflict_management'))
                    <div class="invalid-feedback">
                        {{ $errors->first('conflict_management') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.conflict_management_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performanceIndicator.fields.attendance') }}</label>
                <select class="form-control {{ $errors->has('attendance') ? 'is-invalid' : '' }}" name="attendance" id="attendance">
                    <option value disabled {{ old('attendance', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\PerformanceIndicator::ATTENDANCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('attendance', $performanceIndicator->attendance) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('attendance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attendance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.attendance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ability_to_meet_deadline">{{ trans('cruds.performanceIndicator.fields.ability_to_meet_deadline') }}</label>
                <input class="form-control {{ $errors->has('ability_to_meet_deadline') ? 'is-invalid' : '' }}" type="text" name="ability_to_meet_deadline" id="ability_to_meet_deadline" value="{{ old('ability_to_meet_deadline', $performanceIndicator->ability_to_meet_deadline) }}">
                @if($errors->has('ability_to_meet_deadline'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ability_to_meet_deadline') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.performanceIndicator.fields.ability_to_meet_deadline_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection