@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hourlyRate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.hourly-rates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hourlyRate.fields.id') }}
                        </th>
                        <td>
                            {{ $hourlyRate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hourlyRate.fields.hourly_grade') }}
                        </th>
                        <td>
                            {{ $hourlyRate->hourly_grade }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hourlyRate.fields.hourly_rate') }}
                        </th>
                        <td>
                            {{ $hourlyRate->hourly_rate }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('payroll.admin.hourly-rates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection