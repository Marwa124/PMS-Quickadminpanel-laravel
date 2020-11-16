@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.account.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.id') }}
                        </th>
                        <td>
                            {{ $account->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.name') }}
                        </th>
                        <td>
                            {{ $account->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.description') }}
                        </th>
                        <td>
                            {{ $account->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.balance') }}
                        </th>
                        <td>
                            {{ $account->balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.permissions') }}
                        </th>
                        <td>
                            @foreach($account->permissions as $key => $permissions)
                                <span class="label label-info">{{ $permissions->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('hr.admin.accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection