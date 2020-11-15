@extends('layouts.admin')
@section('content')
<h3 class="page-title">{{ trans('cruds.timeReport.reports.title') }}</h3>

<form method="get">
    <div class="row">
        <div class="col-2 form-group">
            <label for='from' class='control-label'>{{ trans('global.timeFrom') }}</label>
            <input type="text" id="from" name="from" class="form-control date" value="{{ old('from', request()->get('from', date('Y-m-d'))) }}">
        </div>
        <div class="col-2 form-group">
            <label for='to' class='control-label'>{{ trans('global.timeTo') }}</label>
            <input type="text" id="to" name="to" class="form-control date" value="{{ old('to', request()->get('to', date('Y-m-d'))) }}">
        </div>
        <div class="col-4">
            <label class="control-label">&nbsp;</label><br>
            <button type="submit" class="btn btn-primary">{{ trans('global.filterDate') }}</button>
        </div>
    </div>
</form>

<div class="card">
    <div class="card-header">
        {{ trans('cruds.timeReport.reports.timeEntriesReport') }}
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>{{ trans('cruds.timeReport.reports.timeByProjects') }}</th>
                        <th></th>
                    </tr>
                    @foreach($projectTimes as $projectTime)
                        <tr>
                            <th>{{ $projectTime['name'] }}</th>
                            <td>{{ gmdate("d H:i:s", $projectTime['time']) }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>{{ trans('cruds.timeReport.reports.timeByWorkType') }}</th>
                        <th></th>
                    </tr>
                    @foreach($workTypeTime as $workType)
                        <tr>
                            <th>{{ $workType['name'] }}</th>
                            <td>{{ gmdate("d H:i:s", $workType['time']) }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
</div>



@endsection

@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: "{{ config('panel.date_format_js') }}"
      })
</script>
@stop