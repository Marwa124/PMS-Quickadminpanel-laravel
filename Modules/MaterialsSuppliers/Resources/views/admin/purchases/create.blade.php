

@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.purchase.title_singular') }}
    </div>


    <purchase-form
        :lang-key={{json_encode(app()->getLocale())}}
    >
    </purchase-form>

</div>

@endsection