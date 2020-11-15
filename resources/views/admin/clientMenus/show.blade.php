@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clientMenu.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-menus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMenu.fields.id') }}
                        </th>
                        <td>
                            {{ $clientMenu->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMenu.fields.label') }}
                        </th>
                        <td>
                            {{ $clientMenu->label }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMenu.fields.link') }}
                        </th>
                        <td>
                            {{ $clientMenu->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMenu.fields.icon') }}
                        </th>
                        <td>
                            {{ $clientMenu->icon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMenu.fields.parent') }}
                        </th>
                        <td>
                            {{ $clientMenu->parent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMenu.fields.sort') }}
                        </th>
                        <td>
                            {{ $clientMenu->sort }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clientMenu.fields.status') }}
                        </th>
                        <td>
                            {{ $clientMenu->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.client-menus.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection