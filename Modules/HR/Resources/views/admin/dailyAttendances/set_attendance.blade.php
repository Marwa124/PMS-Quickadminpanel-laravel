@extends('layouts.admin')
@inject('setTime', 'Modules\HR\Entities\SetTime')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('cruds.dailyAttendance.title_singular') }} {{ trans('global.list') }}
    </div>

        <?php
            $setimes= $setTime::all();
            foreach($setimes as $time)
            {
            $id=$time->id;
            $intime=$time->in_time;
            $outtime=$time->out_time;
            }

        ?>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title btn-success">{{ __('New Attendance') }}</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <form action="{{ Route('hr.admin.daily-attendances.set') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <div class="input-group margin">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="date" class="form-control" id="datepicker3" value="{{ $date }}">
                                    <span class="input-group-btn">
                                      <button type="submit" class="btn btn-info btn-flat"><i class="icon fa fa-arrow-right"></i> {{ __('Go') }}</button>
                                  </span>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <!-- /. end col -->
              <div class="col-md-12">
                @if (!empty(Session::get('message')))
                <div class="alert alert-success alert-dismissible" id="notification_box">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-check"></i> {{ Session::get('message') }}
                </div>
                @elseif (!empty(Session::get('exception')))
                <div class="alert alert-warning alert-dismissible" id="notification_box">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-warning"></i> {{ Session::get('exception') }}
                </div>
                @endif
            </div>




             <!-- /.Notification Box -->
             <form action="" method="post">
                {{ csrf_field() }}
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('SL#') }}</th>
                            <th>{{ __('Employee Name') }}</th>
                            <th>{{ __('Designation') }}</th>
                            <th  class="text-center">{{ __('Attendance') }}</th>
                            <th>{{ __('Leave Category') }}</th>
                            <th>{{ __('In Time /') }} <a href="#" data-toggle="modal" data-target="#modal-sm">{{ __('Set Time') }}</a></th>
                            <th>{{ __('Out Time /') }} <a href="#" data-toggle="modal" data-target="#modal-sm">{{ __('Set Time') }}</a></th>
                        </tr>
                    </thead>





                    <tbody>
                        @php ($sl = 1)
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{ $sl++ }}</td>
                            <td>
                                <a href="{{ route('admin.account-details.show', $employee['id']) }}">{{ $employee['fullname'] }}</a>
                                <input type="hidden" name="user_id[]" value="{{ $employee['id'] }}">
                                <input type="hidden" name="attendance_date[]" value="{{ $date }}">
                            </td>
                            <td>{{ $employee['designation']['designation_name'] }}</td>
                            <td  class="text-center">
                                <div class="form-group">
                                  <div class="checkbox">
                                    <label>
                                        <input type="hidden" name="attendance_status[]" value="1"><input type="checkbox" onclick="this.previousSibling.value=1-this.previousSibling.value" checked>
                                    </label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <select name="leave_category_id[]" class="form-control">
                                    <option selected value="0">{{ __('Select one') }}</option>
                                    @foreach($leave_categories as $leave_category)
                                    <option value="{{ $leave_category['id'] }}">{{ $leave_category['leave_category'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" name="check_in[]" class="form-control" value="{{$intime}}">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" name="check_out[]" class="form-control" value="{{$outtime}}">
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7"><button type="submit" class="btn btn-primary btn-flat pull-right"><i class="icon fa fa-save"></i> {{ __('Save') }}</button></td>
                    </tr>
                </tfoot>
            </table>
        </form>






<!-- ===============================/.modal============================== -->
      <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header settime">
              <h4 class="modal-title">{{ __('Set of both New Time') }}  </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


     @if($setimes->count()>0)


        <form action="{{ route('hr.admin.daily-attendances.setTime') }}" method="post">
            {{ csrf_field() }}
            <div class="modal-body">

                <input type="hidden" name="id" value="{{$id}}">


                <label>{{ __('In Time') }} <span class="text-danger">*</span></label>
                <div class="form-group">
                    <input type="text" name="in_time" class="form-control" value="{{$intime}}">
                </div>
                <label>{{ __('Out Time') }}<span class="text-danger">*</span></label>
                <div class="form-group">
                    <input type="text" name="out_time" class="form-control" value="{{$outtime}}">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
            </div>
        </form>

          @else

        <form action="{{ route('hr.admin.daily-attendances.set') }}" method="post">
            {{ csrf_field() }}
            <div class="modal-body">


                <label>{{ __('In Time') }} <span class="text-danger">*</span></label>
                <div class="form-group">
                    <input type="text" name="in_time" class="form-control" value="09:12:00">
                </div>
                <label>{{ __('Out Time') }}<span class="text-danger">*</span></label>
                <div class="form-group">
                    <input type="text" name="out_time" class="form-control" value="17:12:00">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
            </div>
        </form>
        @endif





          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- ================================/.modal =============================-->


    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
</section>
<!-- /.content -->
</div>
<script type="text/javascript">
    $(document).ready(function(){

    });
</script>
@endsection
