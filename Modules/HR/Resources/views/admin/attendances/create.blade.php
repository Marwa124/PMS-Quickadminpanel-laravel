@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.attendances.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.attendances.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.attendances.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user_id') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $key => $label)
                        @foreach ($label as $key => $item)
                           @if ($key != 0)
                            <option value="{{ $key }}" {{ old('user_id') === (string) $key ? 'selected' : '' }} {{ $key == 0 ? 'disabled' : '' }}>{{ $item }}</option>
                           @endif
                        @endforeach
                    @endforeach
                </select>
                @if($errors->has('user_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendances.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date" class="required">{{ trans('cruds.attendances.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ date('Y-m-d') }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendances.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_in">{{ trans('cruds.attendances.fields.date_in') }}</label>
                <input class="form-control timepicker {{ $errors->has('date_in') ? 'is-invalid' : '' }}" type="text" name="date_in" id="date_in" value="{{ old('date_in') }}">
                @if($errors->has('date_in'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_in') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendances.fields.date_in_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_out">{{ trans('cruds.attendances.fields.date_out') }}</label>
                <input class="form-control timepicker {{ $errors->has('date_out') ? 'is-invalid' : '' }}" type="text" name="date_out" id="date_out" value="{{ old('date_out') }}">
                @if($errors->has('date_out'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_out') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendances.fields.date_out_helper') }}</span>
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
