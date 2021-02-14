@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.settlement.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("finance.admin.settlement.store") }}" enctype="multipart/form-data">
                @csrf


                <input type="hidden"  name="pettycash_id" value="{{$pettycash->id ?? ''}}" >
                <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">





                <div class="form-group">
                    <label class="required" for="invoice_number">{{ trans('cruds.settlement.fields.invoice_number') }}</label>
                    <input class="form-control {{ $errors->has('invoice_number') ? 'is-invalid' : '' }}" type="text"
                           name="invoice_number" id="invoice_number" value="{{ old('invoice_number','') }}" required>
                    @if($errors->has('invoice_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('invoice_number') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="required" for="amount">{{ trans('cruds.settlement.fields.amount') }}</label>
                    <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number"
                           name="amount" id="amount" value="{{ old('amount','') }}" required>
                    @if($errors->has('amount'))
                        <div class="invalid-feedback">
                            {{ $errors->first('amount') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="required" for="date">{{ trans('cruds.settlement.fields.date') }}</label>
                    <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="date"
                           name="date" id="date" value="{{ old('date',date('Y-m-d')) }}" required>
                    @if($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                </div>


                    <div class="form-group">
                        <label class="required"
                               for="settlement_type">{{ trans('cruds.settlement.fields.settlement_type') }}</label>
                        <select
                            class="form-control select2 {{ $errors->has('settlement_type') ? 'is-invalid' : '' }}"
                            name="settlement_type" id="settlement_type" required>
                            <option value="">{{ trans('cruds.settlement.fields.choose_settlement_type') }}</option>

                            <option value="ST"  {{ old('settlement_type') == 'ST' ? 'selected' : ''  }} >{{ trans('cruds.settlement.fields.ST')   }}</option>
                            <option value="TR"  {{ old('settlement_type') == 'TR' ? 'selected' : ''  }} >{{ trans('cruds.settlement.fields.TR')   }}</option>
                            <option value="E&W" {{ old('settlement_type') == 'E&W' ? 'selected' : '' }} >{{ trans('cruds.settlement.fields.E&W')  }}</option>
                            <option value="TEL" {{ old('settlement_type') == 'TEL' ? 'selected' : '' }} >{{ trans('cruds.settlement.fields.TEL')  }}</option>
                            <option value="IT"  {{ old('settlement_type') == 'IT' ? 'selected' : ''  }} >{{ trans('cruds.settlement.fields.IT')   }}</option>
                            <option value="F&B" {{ old('settlement_type') == 'F&B' ? 'selected' : '' }} >{{ trans('cruds.settlement.fields.F&B')  }}</option>
                            <option value="M&C" {{ old('settlement_type') == 'M&C' ? 'selected' : '' }} >{{ trans('cruds.settlement.fields.M&C')  }}</option>

                        </select>
                        @if($errors->has('settlement_type'))
                            <div class="invalid-feedback">
                                {{ $errors->first('settlement_type') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.settlement.fields.settlement_type_helper') }}</span>
                    </div>


                <div class="form-group">
                    <label for="relation">{{ trans('cruds.settlement.fields.office') }}</label>
                    <input class="  {{ $errors->has('relation') ? 'is-invalid' : '' }}" name="relation" type="radio"
                              id="office" value="{!! old('relation') !!}" checked>
                    <label for="client">{{ trans('cruds.settlement.fields.client') }}</label>
                    <input class="  {{ $errors->has('relation') ? 'is-invalid' : '' }}" name="relation" type="radio"
                              id="client" value="{!! old('relation') !!}">
                    <label for="project">{{ trans('cruds.settlement.fields.project') }}</label>
                    <input class="  {{ $errors->has('relation') ? 'is-invalid' : '' }}" name="relation" type="radio"
                              id="project" value="{!! old('relation') !!}">
                    @if($errors->has('relation'))
                        <div class="invalid-feedback">
                            {{ $errors->first('relation') }}
                        </div>
                    @endif
                </div>

                <div class="form-group" id="project_div" style="display: none">
                    <label class="required"
                           for="project_id">{{ trans('cruds.settlement.fields.project_id') }}</label>
                    <select
                        class="form-control select2 {{ $errors->has('project_id') ? 'is-invalid' : '' }}"
                        name="project_id" id="project_id">
                        <option value="">{{ trans('cruds.settlement.fields.choose_project') }}</option>

                                @foreach($projects as $id => $project)
                                    <option
                                        value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }} >{{  $project->{'name_'.app()->getLocale()} ?? ''  }}</option>
                                @endforeach

                    </select>
                    @if($errors->has('project_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('project_id') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.settlement.fields.project_id_helper') }}</span>
                </div>

                <div class="form-group" id="client_div" style="display: none">
                    <label class="required"
                           for="client_id">{{ trans('cruds.settlement.fields.client_id') }}</label>
                    <select
                        class="form-control select2 {{ $errors->has('client_id') ? 'is-invalid' : '' }}"
                        name="client_id" id="client_id">
                        <option value="">{{ trans('cruds.settlement.fields.choose_client') }}</option>

                                @foreach($clients as $id => $client)
                                    <option
                                        value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }} >{{  $client->name ?? ''  }}</option>
                                @endforeach

                    </select>
                    @if($errors->has('client_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('client_id') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.settlement.fields.client_id_helper') }}</span>
                </div>


                <div class="form-group">
                    <label for="description">{{ trans('cruds.settlement.fields.description') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                              id="description">{!! old('description') !!}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="attachments">{{ trans('cruds.settlement.fields.attachments') }}</label>
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

            $('#client').click(function(){
                $('#project_div').hide(60);
                $('#client_div').show(75);
            });
            $('#project').click(function(){
                $('#client_div').hide(60);
                $('#project_div').show(75);
            });
            $('#office').click(function(){
                $('#client_div').hide(60);
                $('#project_div').hide(60);
            });

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
            url: '{{ route('finance.admin.settlement.storeMedia') }}',
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
