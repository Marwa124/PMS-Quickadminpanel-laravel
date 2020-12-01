@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.proposal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('sales.admin.proposals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.id') }}
                        </th>
                        <td>
                            {{ $proposal->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.reference_no') }}
                        </th>
                        <td>
                            {{ $proposal->reference_no }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.subject') }}
                        </th>
                        <td>
                            {{ $proposal->subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.module') }}
                        </th>
                        <td>
                            {{ $proposal->module }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.proposal_date') }}
                        </th>
                        <td>
                            {{ $proposal->proposal_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.expire_date') }}
                        </th>
                        <td>
                            {{ $proposal->expire_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.alert_overdue') }}
                        </th>
                        <td>
                            {{ $proposal->alert_overdue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.currency') }}
                        </th>
                        <td>
                            {{ $proposal->currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.notes') }}
                        </th>
                        <td>
                            {!! $proposal->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.total_tax') }}
                        </th>
                        <td>
                            {{ $proposal->total_tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.total_cost_price') }}
                        </th>
                        <td>
                            {{ $proposal->total_cost_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.tax') }}
                        </th>
                        <td>
                            {{ $proposal->tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.status') }}
                        </th>
                        <td>
                            {{ $proposal->status }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.date_sent') }}
                        </th>
                        <td>
                            {{ $proposal->date_sent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.proposal_deleted') }}
                        </th>
                        <td>
                            {{ Modules\Sales\Entities\Proposal::PROPOSAL_DELETED_SELECT[$proposal->proposal_deleted] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.emailed') }}
                        </th>
                        <td>
                            {{ Modules\Sales\Entities\Proposal::EMAILED_SELECT[$proposal->emailed] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.show_client') }}
                        </th>
                        <td>
                            {{ Modules\Sales\Entities\Proposal::SHOW_CLIENT_SELECT[$proposal->show_client] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.convert') }}
                        </th>
                        <td>
                            {{ Modules\Sales\Entities\Proposal::CONVERT_SELECT[$proposal->convert] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.convert_module') }}
                        </th>
                        <td>
                            {{ $proposal->convert_module }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proposal.fields.permissions') }}
                        </th>
                        <td>
                            @foreach($proposal->permissions as $key => $permissions)
                                <span class="label label-info">{{ $permissions->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('sales.admin.proposals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection