@extends('layouts.admin')
@section('content')

@inject('accountDetailModel', 'Modules\HR\Entities\AccountDetail')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.accountDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("hr.admin.account-details.store") }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="employment_id">

            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.accountDetail.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fullname">{{ trans('cruds.accountDetail.fields.fullname') }}</label>
                <input class="form-control {{ $errors->has('fullname') ? 'is-invalid' : '' }}" type="text" name="fullname" id="fullname" value="{{ old('fullname', '') }}" required>
                @if($errors->has('fullname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fullname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.fullname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company">{{ trans('cruds.accountDetail.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', '') }}">
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.accountDetail.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country">{{ trans('cruds.accountDetail.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}">
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="locale">{{ trans('cruds.accountDetail.fields.locale') }}</label>
                <input class="form-control {{ $errors->has('locale') ? 'is-invalid' : '' }}" type="text" name="locale" id="locale" value="{{ old('locale', '') }}">
                @if($errors->has('locale'))
                    <div class="invalid-feedback">
                        {{ $errors->first('locale') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.locale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.accountDetail.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.accountDetail.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.accountDetail.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}">
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="skype">{{ trans('cruds.accountDetail.fields.skype') }}</label>
                <input class="form-control {{ $errors->has('skype') ? 'is-invalid' : '' }}" type="text" name="skype" id="skype" value="{{ old('skype', '') }}">
                @if($errors->has('skype'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skype') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.skype_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="language">{{ trans('cruds.accountDetail.fields.language') }}</label>
                <input class="form-control {{ $errors->has('language') ? 'is-invalid' : '' }}" type="text" name="language" id="language" value="{{ old('language', '') }}">
                @if($errors->has('language'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.language_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="designation_id">{{ trans('cruds.accountDetail.fields.designation') }}</label>
                <select class="form-control select2 {{ $errors->has('designation') ? 'is-invalid' : '' }}" name="designation_id" id="designation_id">
                    @foreach($designations as $id => $designation)
                        <option value="{{ $id }}" {{ old('designation_id') == $id ? 'selected' : '' }}>{{ $designation }}</option>
                    @endforeach
                </select>
                @if($errors->has('designation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('designation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.designation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="designation_id">{{ trans('cruds.accountDetail.fields.set_time') }}</label>
                <select class="form-control select2 {{ $errors->has('set_time') ? 'is-invalid' : '' }}" name="set_time_id" id="set_time_id">
                    @foreach($set_times as $id => $set_time)
                        <option value="{{ $id }}" {{ old('set_time_id') == $id ? 'selected' : '' }}>{{ $set_time }}</option>
                    @endforeach
                </select>
                @if($errors->has('set_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('set_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.set_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="avatar">{{ trans('cruds.accountDetail.fields.avatar') }}</label>
                <div class="needsclick dropzone {{ $errors->has('avatar') ? 'is-invalid' : '' }}" id="avatar-dropzone">
                </div>
                @if($errors->has('avatar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('avatar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.avatar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="joining_date">{{ trans('cruds.accountDetail.fields.joining_date') }}</label>
                <input class="form-control date {{ $errors->has('joining_date') ? 'is-invalid' : '' }}" type="text" name="joining_date" id="joining_date" value="{{ old('joining_date') }}">
                @if($errors->has('joining_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('joining_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.joining_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="present_address">{{ trans('cruds.accountDetail.fields.present_address') }}</label>
                <input class="form-control {{ $errors->has('present_address') ? 'is-invalid' : '' }}" type="text" name="present_address" id="present_address" value="{{ old('present_address', '') }}">
                @if($errors->has('present_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('present_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.present_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_birth">{{ trans('cruds.accountDetail.fields.date_of_birth') }}</label>
                <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}">
                @if($errors->has('date_of_birth'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_birth') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.date_of_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.accountDetail.fields.gender') }}</label>
                @foreach($accountDetailModel::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.accountDetail.fields.martial_status') }}</label>
                <select class="form-control {{ $errors->has('martial_status') ? 'is-invalid' : '' }}" name="martial_status" id="martial_status" required>
                    <option value disabled {{ old('martial_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($accountDetailModel::martial_status_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('martial_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('martial_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('martial_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.martial_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="father_name">{{ trans('cruds.accountDetail.fields.father_name') }}</label>
                <input class="form-control {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" id="father_name" value="{{ old('father_name', '') }}">
                @if($errors->has('father_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('father_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.father_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mother_name">{{ trans('cruds.accountDetail.fields.mother_name') }}</label>
                <input class="form-control {{ $errors->has('mother_name') ? 'is-invalid' : '' }}" type="text" name="mother_name" id="mother_name" value="{{ old('mother_name', '') }}">
                @if($errors->has('mother_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mother_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.mother_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="passport">{{ trans('cruds.accountDetail.fields.passport') }}</label>
                <input class="form-control {{ $errors->has('passport') ? 'is-invalid' : '' }}" type="text" name="passport" id="passport" value="{{ old('passport', '') }}">
                @if($errors->has('passport'))
                    <div class="invalid-feedback">
                        {{ $errors->first('passport') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.passport_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.accountDetail.fields.direction') }}</label>
                @foreach($accountDetailModel::DIRECTION_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('direction') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="direction_{{ $key }}" name="direction" value="{{ $key }}" {{ old('direction', 'ltr') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="direction_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('direction'))
                    <div class="invalid-feedback">
                        {{ $errors->first('direction') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.accountDetail.fields.direction_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.avatarDropzone = {
    url: '{{ route('hr.admin.account-details.storeMedia') }}',
    maxFilesize: 1, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1,
    //   width: 35,
    //   height: 35
    },
    success: function (file, response) {
      $('form').find('input[name="avatar"]').remove()
      $('form').append('<input type="hidden" name="avatar" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="avatar"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($accountDetail) && $accountDetail->avatar)
      var file = {!! json_encode($accountDetail->avatar) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="avatar" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection
