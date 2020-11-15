@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.crmNote.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crm-notes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.crmNote.fields.id') }}
                        </th>
                        <td>
                            {{ $crmNote->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmNote.fields.customer') }}
                        </th>
                        <td>
                            {{ $crmNote->customer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmNote.fields.note') }}
                        </th>
                        <td>
                            {{ $crmNote->note }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmNote.fields.added_by') }}
                        </th>
                        <td>
                            {{ $crmNote->added_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmNote.fields.is_client') }}
                        </th>
                        <td>
                            {{ App\Models\CrmNote::IS_CLIENT_RADIO[$crmNote->is_client] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crmNote.fields.user') }}
                        </th>
                        <td>
                            {{ $crmNote->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crm-notes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection