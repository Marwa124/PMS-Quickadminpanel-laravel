@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.lead.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.leads.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.lead.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact_name">{{ trans('cruds.lead.fields.contact_name') }}</label>
                <input class="form-control {{ $errors->has('contact_name') ? 'is-invalid' : '' }}" type="text" name="contact_name" id="contact_name" value="{{ old('contact_name', '') }}">
                @if($errors->has('contact_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contact_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.contact_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="salutation_id">{{ trans('cruds.lead.fields.salutation') }}</label>
                <select class="form-control select2 {{ $errors->has('salutation') ? 'is-invalid' : '' }}" name="salutation_id" id="salutation_id">
                    @foreach($salutations as $id => $salutation)
                        <option value="{{ $id }}" {{ old('salutation_id') == $id ? 'selected' : '' }}>{{ $salutation }}</option>
                    @endforeach
                </select>
                @if($errors->has('salutation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salutation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.salutation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="interested_id">{{ trans('cruds.lead.fields.interested') }}</label>
                <select class="form-control select2 {{ $errors->has('interested') ? 'is-invalid' : '' }}" name="interested_id" id="interested_id">
                    @foreach($interesteds as $id => $interested)
                        <option value="{{ $id }}" {{ old('interested_id') == $id ? 'selected' : '' }}>{{ $interested }}</option>
                    @endforeach
                </select>
                @if($errors->has('interested'))
                    <div class="invalid-feedback">
                        {{ $errors->first('interested') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.interested_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="organization">{{ trans('cruds.lead.fields.organization') }}</label>
                <input class="form-control {{ $errors->has('organization') ? 'is-invalid' : '' }}" type="text" name="organization" id="organization" value="{{ old('organization', '') }}">
                @if($errors->has('organization'))
                    <div class="invalid-feedback">
                        {{ $errors->first('organization') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.organization_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lead_status_id">{{ trans('cruds.lead.fields.lead_status') }}</label>
                <select class="form-control select2 {{ $errors->has('lead_status') ? 'is-invalid' : '' }}" name="lead_status_id" id="lead_status_id">
                    @foreach($lead_statuses as $id => $lead_status)
                        <option value="{{ $id }}" {{ old('lead_status_id') == $id ? 'selected' : '' }}>{{ $lead_status }}</option>
                    @endforeach
                </select>
                @if($errors->has('lead_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lead_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.lead_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lead_source_id">{{ trans('cruds.lead.fields.lead_source') }}</label>
                <select class="form-control select2 {{ $errors->has('lead_source') ? 'is-invalid' : '' }}" name="lead_source_id" id="lead_source_id">
                    @foreach($lead_sources as $id => $lead_source)
                        <option value="{{ $id }}" {{ old('lead_source_id') == $id ? 'selected' : '' }}>{{ $lead_source }}</option>
                    @endforeach
                </select>
                @if($errors->has('lead_source'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lead_source') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.lead_source_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lead_category_id">{{ trans('cruds.lead.fields.lead_category') }}</label>
                <select class="form-control select2 {{ $errors->has('lead_category') ? 'is-invalid' : '' }}" name="lead_category_id" id="lead_category_id">
                    @foreach($lead_categories as $id => $lead_category)
                        <option value="{{ $id }}" {{ old('lead_category_id') == $id ? 'selected' : '' }}>{{ $lead_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('lead_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lead_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.lead_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="imported_from_email">{{ trans('cruds.lead.fields.imported_from_email') }}</label>
                <input class="form-control {{ $errors->has('imported_from_email') ? 'is-invalid' : '' }}" type="number" name="imported_from_email" id="imported_from_email" value="{{ old('imported_from_email', '0') }}" step="1">
                @if($errors->has('imported_from_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('imported_from_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.imported_from_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company_name">{{ trans('cruds.lead.fields.company_name') }}</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', '') }}">
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.lead.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country">{{ trans('cruds.lead.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', '') }}">
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('cruds.lead.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', '') }}">
                @if($errors->has('state'))
                    <div class="invalid-feedback">
                        {{ $errors->first('state') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.lead.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.lead.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.lead.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.lead.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.lead.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}">
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.lead.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.lead.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes') !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="skype">{{ trans('cruds.lead.fields.skype') }}</label>
                <input class="form-control {{ $errors->has('skype') ? 'is-invalid' : '' }}" type="text" name="skype" id="skype" value="{{ old('skype', '') }}">
                @if($errors->has('skype'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skype') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.skype_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.lead.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.lead.fields.permission') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $id => $permission)
                        <option value="{{ $id }}" {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permission }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lead.fields.permission_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/leads/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $lead->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection