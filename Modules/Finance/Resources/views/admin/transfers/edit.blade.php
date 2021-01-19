@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.transfers.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("finance.admin.transfers.update",$transfer->id) }}"
                  enctype="multipart/form-data">
                @method("PUT")
                @csrf

                <div class="form-group">
                    <label class="required"
                           for="from_account_id">{{ trans('cruds.transfers.fields.from_account') }}</label>
                    <select class="form-control select2 {{ $errors->has('from_account') ? 'is-invalid' : '' }}"
                            name="from_account" id="from_account_id" required disabled>
                        @foreach($accounts as $id => $account)
                            <option
                                value="{{ $account->id }}" {{  $transfer->from_account == $account->id  ? 'selected' : ''  }}>{{ $account->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('from_account'))
                        <div class="invalid-feedback">
                            {{ $errors->first('from_account') }}
                        </div>
                    @endif
                </div>


                <div class="form-group">
                    <label class="required" for="to_account_id">{{ trans('cruds.transfers.fields.to_account') }}</label>
                    <select class="form-control select2 {{ $errors->has('to_account') ? 'is-invalid' : '' }}"
                            name="to_account" id="to_account_id" required disabled>
                        @foreach($accounts as $id => $account)
                            <option
                                value="{{ $account->id }}" {{$transfer->to_account == $account->id  ? 'selected' : ''   }}>{{ $account->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('to_account'))
                        <div class="invalid-feedback">
                            {{ $errors->first('to_account') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="required" for="date">{{ trans('cruds.transfers.fields.date') }}</label>
                    <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text"
                           name="date" id="date" value="{{ old('date',$transfer->date) }}" required>
                    @if($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="notes">{{ trans('cruds.transfers.fields.notes') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes"
                              id="notes">{!! old('notes',$transfer->notes) !!}</textarea>
                    @if($errors->has('notes'))
                        <div class="invalid-feedback">
                            {{ $errors->first('notes') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="required" for="amount">{{ trans('cruds.transfers.fields.amount') }}</label>
                    <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number"
                            id="amount" name="amount" value="{{ old('amount',$transfer->amount) }}"  readonly="true">
                    @if($errors->has('amount'))
                        <div class="invalid-feedback">
                            {{ $errors->first('amount') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label
                        class="required"
                        for="payment_method_id">{{ trans('cruds.transfers.fields.payment_method') }}</label>
                    <select class="form-control select2 {{ $errors->has('payment_method_id') ? 'is-invalid' : '' }}"
                            name="payment_method_id" id="payment_method_id" required>
                        <option disabled
                                value="">@lang('cruds.transfers.fields.select_payment_method')</option>

                        @foreach($payment_methods as $id => $payment_method)
                            <option
                                value="{{ $payment_method->id }}" {{  old('payment_method_id') ? old('payment_method_id') : $transfer->payment_method_id == $payment_method->id  ? 'selected' : ''  }}>{{ $payment_method->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('payment_method_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('payment_method_id') }}
                        </div>
                    @endif
                </div>


                <div class="form-group">
                    <label for="reference">{{ trans('cruds.transfers.fields.reference') }}</label>
                    <input class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" type="text"
                           name="reference" id="reference" value="{{ old('reference',$transfer->reference) }}">
                    @if($errors->has('reference'))
                        <div class="invalid-feedback">
                            {{ $errors->first('reference') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="attachments">{{ trans('cruds.transfers.fields.attachments') }}</label>
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
                    {!! $attachments!!}
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

        function delete_media(id){

            var url = "{{route('finance.admin.transfers.delete.attach',['dummyid',$transfer->id])}}";
            url = url.replace('dummyid', id);
            $.ajax({
                url: url,
                success: function (result) {
                    $(".delete-media-"+id).hide(1000);
                }
            });
        }
    </script>


    <script>
        Dropzone.options.attachmentsDropzone = {
            url: '{{ route('finance.admin.transfers.storeMedia') }}',
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
