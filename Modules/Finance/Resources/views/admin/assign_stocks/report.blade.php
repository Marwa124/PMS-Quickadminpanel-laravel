@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.assign_stocks.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">

            <form method="POST" action="#">
                @csrf
                <div class="form-group">
                    <label class="required"
                           for="user_id">{{ trans('cruds.assign_stocks.fields.assigned_user') }}</label>
                    <select class="form-control select2 {{ $errors->has('stock_sub_category') ? 'is-invalid' : '' }}"
                            name="user_id" onchange="get_data()" id="user_id"  required>
                        <option value="">{{ trans('cruds.assign_stocks.fields.choose_user') }}</option>

                        @foreach($designations as $designation)
                            <optgroup label="{{$designation->designation_name}}">
                                @foreach($designation->accountDetails as $id => $user)
                                    <option value="{{ $user->user_id }}" {{ old('user_id') == $user->user_id ? 'selected' : '' }} id="userdata_{{ $user->user_id}}" >{{ $user->fullname }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                    @if($errors->has('stock_sub_category'))
                        <div class="invalid-feedback">
                            {{ $errors->first('stock_sub_category') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.assign_stocks.fields.user_id_helper') }}</span>
                </div>

            </form>


        </div>
    </div>
    <div id="result_div">

    </div>

@endsection
@section('scripts')
    @parent
    <script>
        function get_data(){
            var url = '/admin/finance/assign_stocks/report/getresult';
            id = $('#user_id').val();
            // Ajax Reuqest
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'post',
                dataType: 'json',
                data: {
                    id: id
                },

                success: function (response) {

                    if (response) {
                        $("#result_div").html('');
                        $("#result_div").append(response);

                    }

                }
            });

        }
    </script>
@endsection
