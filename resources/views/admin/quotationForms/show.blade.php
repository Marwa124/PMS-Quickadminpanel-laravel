@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.quotationForm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quotation-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationForm.fields.id') }}
                        </th>
                        <td>
                            {{ $quotationForm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationForm.fields.title') }}
                        </th>
                        <td>
                            {{ $quotationForm->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationForm.fields.code') }}
                        </th>
                        <td>
                            {{ $quotationForm->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationForm.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\QuotationForm::STATUS_RADIO[$quotationForm->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationForm.fields.user') }}
                        </th>
                        <td>
                            {{ $quotationForm->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quotation-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection