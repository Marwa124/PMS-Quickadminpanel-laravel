@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.penaltyCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penalty-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.penaltyCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $penaltyCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penaltyCategory.fields.type') }}
                        </th>
                        <td>
                            {{ $penaltyCategory->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penaltyCategory.fields.fine_amount') }}
                        </th>
                        <td>
                            {{ $penaltyCategory->fine_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.penaltyCategory.fields.penelty_days') }}
                        </th>
                        <td>
                            {{ $penaltyCategory->penelty_days }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.penalty-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection