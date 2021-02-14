@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.petty_cash.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("finance.admin.petty_cash.store") }}" enctype="multipart/form-data">
                @csrf





                @if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin'))
                    <div class="form-group">
                        <label class="required"
                               for="user_id">{{ trans('cruds.petty_cash.fields.fullname') }}</label>
                        <select
                            class="form-control select2 {{ $errors->has('user_id') ? 'is-invalid' : '' }}"
                            name="user_id" id="user_id" required>
                            <option value="">{{ trans('cruds.petty_cash.fields.choose_user') }}</option>

                            @foreach($designations as $designation)
                                <optgroup label="{{$designation->designation_name}}">
                                    @foreach($designation->accountDetails as $id => $user)
                                        <option
                                            value="{{ $user->user_id }}" {{ old('user_id') == $user->user_id ? 'selected' : '' }} >{{ $user->fullname }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @if($errors->has('user_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('user_id') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.petty_cash.fields.user_id_helper') }}</span>
                    </div>
                @else
                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">

                @endif


                <div class="form-group">
                    <label class="required" for="amount">{{ trans('cruds.petty_cash.fields.amount') }}</label>
                    <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number"
                           name="amount" id="amount" value="{{ old('amount','') }}" required>
                    @if($errors->has('amount'))
                        <div class="invalid-feedback">
                            {{ $errors->first('amount') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="required" for="date">{{ trans('cruds.petty_cash.fields.date') }}</label>
                    <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="date"
                           name="date" id="date" value="{{ old('date',date('Y-m-d')) }}" required>
                    @if($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="description">{{ trans('cruds.petty_cash.fields.description') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                              id="description">{!! old('description') !!}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="attachments">{{ trans('cruds.petty_cash.fields.attachments') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}"
                         id="attachments-dropzone">
                    </div>
                    @if($errors->has('attachments'))
                        <div class="invalid-feedback">
                            {{ $errors->first('attachments') }}
                        </div>
                    @endif
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

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        // extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>


    <script>
        Dropzone.options.attachmentsDropzone = {
            url: '{{ route('finance.admin.petty_cash.storeMedia') }}',
            maxFilesize: 2, // MB
            maxFiles: 2,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 2
            },
            success: function (file, response) {
                $('form').find('input[name="attachments"]').remove();
                $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove();
                if (file.status !== 'error') {
                    $('form').find('input[name="attachments[]"]').remove();
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                    @if(isset($transfer) && $transfer->attachments)
                var file = {!! json_encode($transfer->attachments) !!}
                        this.options.addedfile.call(this, file);
                file.previewElement.classList.add('dz-complete');
                $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">');
                this.options.maxFiles = this.options.maxFiles - 1;
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error');
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]');
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i];
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
