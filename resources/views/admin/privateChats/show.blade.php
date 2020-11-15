@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.privateChat.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.private-chats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.privateChat.fields.id') }}
                        </th>
                        <td>
                            {{ $privateChat->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.privateChat.fields.title') }}
                        </th>
                        <td>
                            {{ $privateChat->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.privateChat.fields.user') }}
                        </th>
                        <td>
                            {{ $privateChat->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.private-chats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection