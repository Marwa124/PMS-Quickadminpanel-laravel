@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.onlinePayment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.online-payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.onlinePayment.fields.id') }}
                        </th>
                        <td>
                            {{ $onlinePayment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.onlinePayment.fields.gateway_name') }}
                        </th>
                        <td>
                            {{ $onlinePayment->gateway_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.onlinePayment.fields.icon') }}
                        </th>
                        <td>
                            {{ $onlinePayment->icon }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.online-payments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection