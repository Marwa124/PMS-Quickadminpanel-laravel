@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kbCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kb-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kbCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $kbCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kbCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $kbCategory->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kbCategory.fields.description') }}
                        </th>
                        <td>
                            {!! $kbCategory->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kbCategory.fields.type') }}
                        </th>
                        <td>
                            {{ $kbCategory->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kbCategory.fields.sort') }}
                        </th>
                        <td>
                            {{ $kbCategory->sort }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kbCategory.fields.status') }}
                        </th>
                        <td>
                            {{ $kbCategory->status }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kb-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection