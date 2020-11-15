@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.quotation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quotations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.id') }}
                        </th>
                        <td>
                            {{ $quotation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.title') }}
                        </th>
                        <td>
                            {{ $quotation->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.user') }}
                        </th>
                        <td>
                            {{ $quotation->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.client') }}
                        </th>
                        <td>
                            {{ $quotation->client->primary_contact ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.name') }}
                        </th>
                        <td>
                            {{ $quotation->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.email') }}
                        </th>
                        <td>
                            {{ $quotation->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.mobile') }}
                        </th>
                        <td>
                            {{ $quotation->mobile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.amount') }}
                        </th>
                        <td>
                            {{ $quotation->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.notes') }}
                        </th>
                        <td>
                            {!! $quotation->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotation.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Quotation::STATUS_RADIO[$quotation->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quotations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection