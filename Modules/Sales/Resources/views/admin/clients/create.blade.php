@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("sales.admin.clients.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="tax_rate">{{ trans('cruds.client.fields.group_name') }}</label>
                <div class="input-group">
                    <select class="form-control  {{ $errors->has('client') ? 'is-invalid' : '' }}"
                        name="customer_group_id" id="customer_group_id" required>
                        @foreach($customerGroups as $id => $customerGroup)
                        <option value="{{ $id }}" {{ old('customer_group_id') == $id ? 'selected' : '' }}>
                            {{ $customerGroup }}</option>
                        @endforeach
                    </select>
                    <span class="input-group-append">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#primaryModal" ><i
                                class="fa fa-plus"></i></button>
                    </span>
                </div>
                </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.client.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email" class="required">{{ trans('cruds.client.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="short_note">{{ trans('cruds.client.fields.short_note') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('short_note') ? 'is-invalid' : '' }}" name="short_note" id="short_note">{!! old('short_note') !!}</textarea>
                @if($errors->has('short_note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.short_note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.client.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', '') }}">
                @if($errors->has('website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.client.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.client.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}">
                @if($errors->has('mobile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fax">{{ trans('cruds.client.fields.fax') }}</label>
                <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" id="fax" value="{{ old('fax', '') }}">
                @if($errors->has('fax'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fax') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.fax_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.client.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.client.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zipcode">{{ trans('cruds.client.fields.zipcode') }}</label>
                <input class="form-control {{ $errors->has('zipcode') ? 'is-invalid' : '' }}" type="text" name="zipcode" id="zipcode" value="{{ old('zipcode', '') }}">
                @if($errors->has('zipcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zipcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.zipcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="currency">{{ trans('cruds.client.fields.currency') }}</label>
                <select class="form-control select_box select2" name="currency">
                    @forelse ($currencies as $currency)
                    <option  {{ old('currency',settings('default_currency')) == $currency->code  ? ' selected' : ''}} value="{{ $currency->code   }}"> {{ $currency->name  }}</option>
                    @empty
                    
                    @endforelse
                </select>       
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                 
                <span class="help-block">{{ trans('cruds.client.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="skype">{{ trans('cruds.client.fields.skype') }}</label>
                <input class="form-control {{ $errors->has('skype') ? 'is-invalid' : '' }}" type="text" name="skype" id="skype" value="{{ old('skype', '') }}">
                @if($errors->has('skype'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skype') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.skype_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin">{{ trans('cruds.client.fields.linkedin') }}</label>
                <input class="form-control {{ $errors->has('linkedin') ? 'is-invalid' : '' }}" type="text" name="linkedin" id="linkedin" value="{{ old('linkedin', '') }}">
                @if($errors->has('linkedin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkedin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.linkedin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.client.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.client.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', '') }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="language">{{ trans('cruds.client.fields.language') }}</label>
                <select class="form-control select_box select2" style="width:100%" name="language">
            
                    <option
                       value="" >
                       @lang('settings.default_language')
                    </option>
                       @forelse ($languages as $language)
                       <option  {{ old('language',settings('default_language')) == $language->name ? 'selected' : ''}} value="{{ $language->name }}"> {{ $language->name }}</option>
                       @empty
                       
                   @endforelse
               </select>   
                @if($errors->has('language'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.language_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country">{{ trans('cruds.client.fields.country') }}</label>
                <select class="form-control select_box"  name="country">
                    <option
                        value="" >
                        @lang('settings.select_country')
                        </option>
                        @forelse ($countries as $country)
                        <option  {{ old('country',settings('company_country')) == $country->value ? ' selected' : ''}} value="{{ $country->value }}"> {{ $country->value }}</option>
                        @empty
                        
                        @endforelse
                    </select>             
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vat">{{ trans('cruds.client.fields.vat') }}</label>
                <input class="form-control {{ $errors->has('vat') ? 'is-invalid' : '' }}" type="text" name="vat" id="vat" value="{{ old('vat', '') }}">
                @if($errors->has('vat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.vat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hosting_company">{{ trans('cruds.client.fields.hosting_company') }}</label>
                <input class="form-control {{ $errors->has('hosting_company') ? 'is-invalid' : '' }}" type="text" name="hosting_company" id="hosting_company" value="{{ old('hosting_company', '') }}">
                @if($errors->has('hosting_company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hosting_company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.hosting_company_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hostname">{{ trans('cruds.client.fields.hostname') }}</label>
                <input class="form-control {{ $errors->has('hostname') ? 'is-invalid' : '' }}" type="text" name="hostname" id="hostname" value="{{ old('hostname', '') }}">
                @if($errors->has('hostname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hostname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.hostname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="port">{{ trans('cruds.client.fields.port') }}</label>
                <input class="form-control {{ $errors->has('port') ? 'is-invalid' : '' }}" type="text" name="port" id="port" value="{{ old('port', '') }}">
                @if($errors->has('port'))
                    <div class="invalid-feedback">
                        {{ $errors->first('port') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.port_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="username" class="required">{{ trans('cruds.client.fields.username') }}</label>
                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username" id="username" value="{{ old('username', '') }}" required>
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.username_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="password" class="required">{{ trans('cruds.client.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.password_helper') }}</span>
            </div>
      
            <div class="form-group">
                <label for="status_id">{{ trans('cruds.client.fields.response') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id">
                    @foreach($statuses as $id => $status)
                        <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $status }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.response_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

<!-- /.modal -->

<div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> {{ trans('global.create') }} {{ trans('cruds.customerGroup.title_singular') }}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST" action="#" id="form2">
                    @csrf
                    <div class="form-group">
                        <label class="required" for="type">{{ trans('cruds.customerGroup.fields.type') }}</label>
                        <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text"
                            name="type" id="type" value="{{ old('type', '') }}" required>

                    </div>
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.customerGroup.fields.name') }}</label>
                        <input class="form-control" type="text" name="namecustomgroup" id="namecustomgroup"
                            value="{{ old('name', '') }}" required>

                    </div>
                    <div class="form-group">
                        <label for="description">{{ trans('cruds.customerGroup.fields.description') }}</label>
                        <textarea class="form-control" name="descriptioncustomgroup"
                            id="descriptioncustomgroup"></textarea>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="customgroupsubmit">
                    {{ trans('global.save') }}</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

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
                xhr.open('POST', '/admin/clients/ckmedia', true);
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
                data.append('crud_id', {{ $client->id ?? 0 }});
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


    //add new custom group 
    // 
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});

    $("#customgroupsubmit").click(function (e) {

        // e.preventDefault();

        var type = $("input[name=type]").val();
        var name = $("input[name=namecustomgroup]").val();
        var description = $("textarea[name=descriptioncustomgroup]").val();
        var url = '{{ route("materialssuppliers.admin.customer-groups.store") }}';

        $.ajax({
                url: url,
                method: 'POST',
                data: {
                    type: type,
                    name: name,
                    description: description
                }
            })
            .done(function (response) {
                $('#customer_group_id').append('<option value="' + response.id + '" selected="selected">' +
                    response.name + '</option>');
                $("#primaryModal").modal("hide");
                $(".modal-backdrop").remove();//remove background
                $('body').removeClass('modal-open');// For scroll run
                $('#primaryModal').find('#form2')[0].reset();

            });
        // .error(function(error){
        //   console.log(error)
        // });


    });
</script>

@endsection