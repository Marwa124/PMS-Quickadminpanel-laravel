@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.department.title_singular') }}
    </div>

    <department-form :department-id="{{$department->id}}" :lang-key={{json_encode(app()->getLocale())}}>
    </department-form>

</div>

@endsection
