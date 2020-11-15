@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transfer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transfers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.id') }}
                        </th>
                        <td>
                            {{ $transfer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.to_account') }}
                        </th>
                        <td>
                            {{ $transfer->to_account }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.from_account') }}
                        </th>
                        <td>
                            {{ $transfer->from_account }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.amount') }}
                        </th>
                        <td>
                            {{ $transfer->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.payment_method') }}
                        </th>
                        <td>
                            {{ $transfer->payment_method->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.reference') }}
                        </th>
                        <td>
                            {{ $transfer->reference }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Transfer::STATUS_SELECT[$transfer->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.notes') }}
                        </th>
                        <td>
                            {!! $transfer->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.date') }}
                        </th>
                        <td>
                            {{ $transfer->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.type') }}
                        </th>
                        <td>
                            {{ $transfer->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.permission') }}
                        </th>
                        <td>
                            @foreach($transfer->permissions as $key => $permission)
                                <span class="label label-info">{{ $permission->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.attachment') }}
                        </th>
                        <td>
                            @if($transfer->attachment)
                                <a href="{{ $transfer->attachment->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transfers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection