@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.deposits.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("finance.admin.deposits.update",$deposit->id) }}"
                  enctype="multipart/form-data">
                @method("PUT")
                <input type="hidden" name="created_by" id="created_by" value="{{auth()->user()->id}}">

                @csrf


                <div class="form-group">
                    <label class="required"  for="title">{{ trans('cruds.deposits.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                           name="title" id="title" value="{{ old('title',$deposit->title) }}"  required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="required"
                           for="account_id">{{ trans('cruds.deposits.fields.account_name') }}</label>
                    <select class="form-control select2 {{ $errors->has('account_id') ? 'is-invalid' : '' }}"
                            name="account_id" id="account_id" required disabled>
                        @foreach($accounts as $id => $account)
                            <option
                                    value="{{ $account->id }}"  {{  $deposit->account_id == $account->id  ? 'selected' : ''  }}>{{ $account->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('account_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('account_id') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="required" for="entry_date">{{ trans('cruds.deposits.fields.entry_date') }}</label>
                    <input class="form-control date {{ $errors->has('entry_date') ? 'is-invalid' : '' }}" type="date"
                           name="entry_date" id="entry_date" value="{{ old('entry_date',$deposit->entry_date) }}" required>
                    @if($errors->has('entry_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('entry_date') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="notes">{{ trans('cruds.deposits.fields.notes') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes"
                              id="notes">{!! old('notes',$deposit->notes) !!}</textarea>
                    @if($errors->has('notes'))
                        <div class="invalid-feedback">
                            {{ $errors->first('notes') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="required" for="amount">{{ trans('cruds.deposits.fields.amount') }}</label>
                    <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number"
                           name="amount" id="amount" value="{{ old('amount', $deposit->amount) }}" required disabled>
                    @if($errors->has('amount'))
                        <div class="invalid-feedback">
                            {{ $errors->first('amount') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label  for="deposits_category">{{ trans('cruds.deposits.fields.deposits_category') }}</label>
                    <select class="form-control select2 {{ $errors->has('deposit_category_id ') ? 'is-invalid' : '' }}"
                            name="deposit_category_id" id="deposits_category" >

                        <option
                                value="" selected>{{ trans('cruds.deposits.fields.select_deposit_category') }}</option>
                        @foreach($deposits_category as $id => $category)
                            <option
                                    value="{{ $category->id }}"  {{  $deposit->deposit_category_id == $category->id  ? 'selected' : ''  }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('deposit_category_id '))
                        <div class="invalid-feedback">
                            {{ $errors->first('deposit_category_id ') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label  for="paid_by">{{ trans('cruds.deposits.fields.paid_by') }}</label>
                    <select class="form-control select2 {{ $errors->has('deposit_category_id ') ? 'is-invalid' : '' }}"
                            name="paid_by_id" id="paid_by" >
                        <option
                                value="" selected>{{ trans('cruds.deposits.fields.select_paid') }}</option>
                        @foreach($clients as $id => $client)
                            <option
                                    value="{{ $client->id }}"  {{  $deposit->paid_by_id == $client->id  ? 'selected' : ''  }}>{{ $client->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('paid_by_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('paid_by_id') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label
                            for="payment_method_id">{{ trans('cruds.deposits.fields.payment_method') }}</label>
                    <select class="form-control select2 {{ $errors->has('payment_method_id') ? 'is-invalid' : '' }}"
                            name="payment_method_id" id="payment_method_id" >
                        <option selected disabled
                                value="" selected>@lang('cruds.deposits.fields.select_payment_method')</option>

                        @foreach($payment_methods as $id => $payment_method)
                            <option
                                    value="{{ $payment_method->id }}" {{ $deposit->paid_by_id == $payment_method->id ? 'selected' : '' }}>{{ $payment_method->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('payment_method_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('payment_method_id') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="reference">{{ trans('cruds.deposits.fields.reference') }}</label>
                    <input class="form-control {{ $errors->has('reference') ? 'is-invalid' : '' }}" type="text"
                           name="reference" id="reference" value="{{ old('reference',$deposit->reference) }}">
                    @if($errors->has('reference'))
                        <div class="invalid-feedback">
                            {{ $errors->first('reference') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="attachments">{{ trans('cruds.deposits.fields.attachments') }}</label>
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

            var url = "{{route('finance.admin.deposits.delete.attach',['dummyid',$deposit->id])}}";
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
            url: '{{ route('finance.admin.deposits.storeMedia') }}',
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
                    @if(isset($deposit) && $deposit->attachments)
                var file = {!! json_encode($deposit->attachments) !!}
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
