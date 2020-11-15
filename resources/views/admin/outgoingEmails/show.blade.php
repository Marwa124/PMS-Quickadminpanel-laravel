@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.outgoingEmail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.outgoing-emails.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.outgoingEmail.fields.id') }}
                        </th>
                        <td>
                            {{ $outgoingEmail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outgoingEmail.fields.send_to') }}
                        </th>
                        <td>
                            {{ $outgoingEmail->send_to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outgoingEmail.fields.send_from') }}
                        </th>
                        <td>
                            {{ $outgoingEmail->send_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outgoingEmail.fields.subject') }}
                        </th>
                        <td>
                            {!! $outgoingEmail->subject !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outgoingEmail.fields.message') }}
                        </th>
                        <td>
                            {!! $outgoingEmail->message !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.outgoingEmail.fields.delivered') }}
                        </th>
                        <td>
                            {{ $outgoingEmail->delivered }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.outgoing-emails.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection