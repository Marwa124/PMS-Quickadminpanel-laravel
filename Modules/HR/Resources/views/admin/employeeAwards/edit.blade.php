@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.employeeAward.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.employee-awards.update", [$employeeAward->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.employeeAward.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $employeeAward->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employeeAward.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.employeeAward.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $employeeAward->user->id ?? '') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employeeAward.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gift_item">{{ trans('cruds.employeeAward.fields.gift_item') }}</label>
                <input class="form-control {{ $errors->has('gift_item') ? 'is-invalid' : '' }}" type="text" name="gift_item" id="gift_item" value="{{ old('gift_item', $employeeAward->gift_item) }}">
                @if($errors->has('gift_item'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gift_item') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employeeAward.fields.gift_item_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="award_amount">{{ trans('cruds.employeeAward.fields.award_amount') }}</label>
                <input class="form-control {{ $errors->has('award_amount') ? 'is-invalid' : '' }}" type="number" name="award_amount" id="award_amount" value="{{ old('award_amount', $employeeAward->award_amount) }}" step="0.01" required>
                @if($errors->has('award_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('award_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employeeAward.fields.award_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="given_date">{{ trans('cruds.employeeAward.fields.given_date') }}</label>
                <input class="form-control date {{ $errors->has('given_date') ? 'is-invalid' : '' }}" type="text" name="given_date" id="given_date" value="{{ old('given_date', $employeeAward->given_date) }}">
                @if($errors->has('given_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('given_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employeeAward.fields.given_date_helper') }}</span>
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