@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.opportunity.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.opportunities.update", [$opportunity->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="lead_id">{{ trans('cruds.opportunity.fields.lead') }}</label>
                <select class="form-control select2 {{ $errors->has('lead') ? 'is-invalid' : '' }}" name="lead_id" id="lead_id">
                    @foreach($leads as $id => $lead)
                        <option value="{{ $id }}" {{ (old('lead_id') ? old('lead_id') : $opportunity->lead->id ?? '') == $id ? 'selected' : '' }}>{{ $lead }}</option>
                    @endforeach
                </select>
                @if($errors->has('lead'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lead') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.opportunity.fields.lead_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.opportunity.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $opportunity->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.opportunity.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="probability">{{ trans('cruds.opportunity.fields.probability') }}</label>
                <input class="form-control {{ $errors->has('probability') ? 'is-invalid' : '' }}" type="text" name="probability" id="probability" value="{{ old('probability', $opportunity->probability) }}">
                @if($errors->has('probability'))
                    <div class="invalid-feedback">
                        {{ $errors->first('probability') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.opportunity.fields.probability_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="stages">{{ trans('cruds.opportunity.fields.stages') }}</label>
                <input class="form-control {{ $errors->has('stages') ? 'is-invalid' : '' }}" type="text" name="stages" id="stages" value="{{ old('stages', $opportunity->stages) }}">
                @if($errors->has('stages'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stages') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.opportunity.fields.stages_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="closed_date">{{ trans('cruds.opportunity.fields.closed_date') }}</label>
                <input class="form-control date {{ $errors->has('closed_date') ? 'is-invalid' : '' }}" type="text" name="closed_date" id="closed_date" value="{{ old('closed_date', $opportunity->closed_date) }}">
                @if($errors->has('closed_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('closed_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.opportunity.fields.closed_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expected_revenue">{{ trans('cruds.opportunity.fields.expected_revenue') }}</label>
                <input class="form-control {{ $errors->has('expected_revenue') ? 'is-invalid' : '' }}" type="number" name="expected_revenue" id="expected_revenue" value="{{ old('expected_revenue', $opportunity->expected_revenue) }}" step="0.01">
                @if($errors->has('expected_revenue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expected_revenue') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.opportunity.fields.expected_revenue_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="new_link">{{ trans('cruds.opportunity.fields.new_link') }}</label>
                <input class="form-control {{ $errors->has('new_link') ? 'is-invalid' : '' }}" type="text" name="new_link" id="new_link" value="{{ old('new_link', $opportunity->new_link) }}">
                @if($errors->has('new_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('new_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.opportunity.fields.new_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="next_action">{{ trans('cruds.opportunity.fields.next_action') }}</label>
                <input class="form-control {{ $errors->has('next_action') ? 'is-invalid' : '' }}" type="text" name="next_action" id="next_action" value="{{ old('next_action', $opportunity->next_action) }}">
                @if($errors->has('next_action'))
                    <div class="invalid-feedback">
                        {{ $errors->first('next_action') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.opportunity.fields.next_action_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.opportunity.fields.notes') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{!! old('notes', $opportunity->notes) !!}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.opportunity.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="permissions">{{ trans('cruds.opportunity.fields.permissions') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple>
                    @foreach($permissions as $id => $permissions)
                        <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $opportunity->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.opportunity.fields.permissions_helper') }}</span>
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
                xhr.open('POST', '/admin/opportunities/ckmedia', true);
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
                data.append('crud_id', {{ $opportunity->id ?? 0 }});
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