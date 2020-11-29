@extends('layouts.admin')
@section('content')
{{-- @can('permission_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.permissions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
            </a>
        </div>
    </div>
@endcan --}}
<div class="card">
    <div class="card-header">
        {{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}
    </div>

    <assign-permissions-to-user :user-id={{$id}}>
    </assign-permissions-to-user>
</div>



@endsection
@section('scripts')
@parent
<script>


</script>
@endsection
