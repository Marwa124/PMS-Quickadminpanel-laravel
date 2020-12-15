@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}
    </div>

    <roles-index :role-id={{$role->id}} :lang-key={{json_encode(app()->getLocale())}}>
    </roles-index>

    <a href="{{route('admin.home')}}">Back to dashboard</a>
</div>



@endsection
@section('scripts')
@parent
<script>


</script>
@endsection
