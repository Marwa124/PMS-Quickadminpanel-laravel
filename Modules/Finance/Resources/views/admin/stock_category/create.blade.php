@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.stock_category.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("finance.admin.stock_category.store") }}"
                  enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label
                           for="sub_category">{{ trans('cruds.stock_category.fields.sub_category') }}</label>
                    <select class="form-control {{ $errors->has('sub_category') ? 'is-invalid' : '' }}"
                            name="sub_category" id="sub_category" onchange="change_display()">
                        <option value="" selected>@lang('cruds.stock_category.fields.new_sub_category')</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('sub_category'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sub_category') }}
                        </div>
                    @endif
                </div>





                <div class="form-group" id="name_div">
                    <label class="required" for="name">{{ trans('cruds.stock_category.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                           id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>


                <div class="form-group">
                    <label class="required"
                           for="name_sub_category">{{ trans('cruds.stock_category.fields.name_sub_category') }}</label>
                    <input class="form-control {{ $errors->has('name_sub_category') ? 'is-invalid' : '' }}" type="text"
                           name="name_sub_category" id="name_sub_category" value="{{ old('name_sub_category', '') }}"
                           required>
                    @if($errors->has('name_sub_category'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name_sub_category') }}
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

        function change_display() {
            if ($('#sub_category').val() == '') {
                $("#name").attr('required', '');
                $('#name_div').show(150);
            }
            else{
                $("#name").removeAttr("required");
                $('#name_div').hide(150);
            }
        }
    </script>

@endsection
