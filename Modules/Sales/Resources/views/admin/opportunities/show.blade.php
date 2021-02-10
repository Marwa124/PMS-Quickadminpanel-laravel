@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.opportunity.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.opportunities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.opportunity.fields.id') }}
                        </th>
                        <td>
                            {{ $opportunity->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.opportunity.fields.lead') }}
                        </th>
                        <td>
                            {{ $opportunity->lead->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.opportunity.fields.name') }}
                        </th>
                        <td>
                            {{ $opportunity->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.opportunity.fields.probability') }}
                        </th>
                        <td>
                            {{ $opportunity->probability }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.opportunity.fields.stages') }}
                        </th>
                        <td>
                            {{ $opportunity->stages }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.opportunity.fields.closed_date') }}
                        </th>
                        <td>
                            {{ $opportunity->closed_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.opportunity.fields.expected_revenue') }}
                        </th>
                        <td>
                            {{ $opportunity->expected_revenue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.opportunity.fields.new_link') }}
                        </th>
                        <td>
                            {{ $opportunity->new_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.opportunity.fields.next_action') }}
                        </th>
                        <td>
                            {{ $opportunity->next_action }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.opportunity.fields.notes') }}
                        </th>
                        <td>
                            {!! $opportunity->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.opportunity.fields.permissions') }}
                        </th>
                        <td>
                            @foreach($opportunity->permissions as $key => $permissions)
                                <span class="label label-info">{{ $permissions->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.opportunities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection