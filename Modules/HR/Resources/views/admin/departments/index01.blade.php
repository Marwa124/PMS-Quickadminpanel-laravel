@extends('layouts.admin')
@section('content')
@inject('users', 'App\Models\User')
@inject('departmentModel', 'Modules\HR\Entities\Department')
<div class="box" bis_skin_checked="1">
    <div class="box-header with-border d-flex justify-content-center" bis_skin_checked="1">
        <h3 class="box-title">Departments</h3>

    </div>
    <div class="box-body" bis_skin_checked="1">
        <div class="col-md-12" bis_skin_checked="1">
            {{-- <form action="http://127.0.0.1:8000/admin/hr/daily-attendances" method="get">
                @csrf --}}
                <div class="form-group m-auto d-flex justify-content-center" bis_skin_checked="1">
                    <div class="col-sm-offset-3 col-sm-6" bis_skin_checked="1">
                        <div class="input-group margin" bis_skin_checked="1">
                            <label class="required" for="department_name">{{ trans('cruds.department.fields.department_name') }}</label>
                            <select class="form-control select2 {{ $errors->has('department_head') ? 'is-invalid' : '' }}" name="department" id="department">
                                <option selected disabled>Choose a department</option>
                                @foreach($departmentModel::pluck('department_name', 'id') as $id => $value)
                                {{-- {{dd($departments::pluck('department_name', 'id'))}} --}}
                                    <option value="{{ $id }}" {{ old('department') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group margin designationSelect mt-2 d-block" bis_skin_checked="1">
                            <label class="required row" for="designation_name">{{ trans('cruds.designation.fields.designation_name') }}</label>
                            <div class="">
                                <select class="form-control select2 designationOptions" name="designation" id="designation">
                                {{-- <option selected disabled>Choose a Designation</option> --}}
                                {{-- @foreach($departmentModel::pluck('department_name', 'id') as $id => $value)
                                <option value="{{ $id }}" {{ old('department') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach --}}
                                </select>
                                {{-- {{route('hr.admin.designations.create')}} --}}
                                @can('designation_create')
                                    <button  data-toggle="modal" data-target="#addDesignationModal" class="btn-xs btn-dark addDesignationBtn">
                                        <i class="fas fa-plus-square"></i>
                                    </button>
                                @endcan
                                <!-- Modal -->
                                <div class="modal fade" id="addDesignationModal" tabindex="-1" role="dialog" aria-labelledby="addDesignationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="addDesignationModalLabel">New Designation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="required" for="designation_name">{{ trans('cruds.designation.fields.designation_name') }}</label>
                                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                                <input class="form-control {{ $errors->has('designation_name') ? 'is-invalid' : '' }}" type="text" name="designation_name" id="designation_name" value="{{ old('designation_name', '') }}" required>
                                                @if($errors->has('designation_name'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('designation_name') }}
                                                    </div>
                                                @endif
                                                <span class="help-block">{{ trans('cruds.designation.fields.designation_name_helper') }}</span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="addDesignation btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                {{-- End Modal --}}

                            </div>
                      </div>
                    </div>
                </div>
          {{-- </form> --}}
      </div>
      <!-- /. end col -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer clearfix" bis_skin_checked="1">

  </div>
  <!-- /.box-footer -->
</div>


@can('department_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('hr.admin.departments.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.department.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="allResult"></div>





@endsection
@section('scripts')
@parent
<script>
    $(function () {

        // $('.designationSelect').css('display', 'none');
        $('.addDesignationBtn').css('display', 'none');
        let table = $('.datatable-Department:not(.ajaxTable)').DataTable({
            paging: false,
            "buttons": [],
        });
        table.buttons( '.csv').disable();
        table.buttons( '.excel').disable();
        table.buttons( '.pdf').disable();
        table.buttons( '.print').disable();
        table.buttons( '.copy').disable();

        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
        $('.datatable thead').on('input', '.search', function () {
            let strict = $(this).attr('strict') || false
            let value = strict && this.value ? "^" + this.value + "$" : this.value
            table
                .column($(this).parent().index())
                .search(value, strict)
                .draw()
        });
        })

</script>
<script>

    $("#department").change(function() {
        $('.addDesignationBtn').css('display', 'block');
        // $('.deleteDesignationBtn').css('display', 'block');

        var departmentId = $('#department').val();
        $.ajax({
            url: '{{route('hr.admin.departments.designations')}}',
            type: 'get',
            dataType:'html',
            data: {
                department_id: departmentId,
            },
            success: function(e){
                
                // console.log(JSON.parse(e));
                var response = JSON.parse(e)
                if (e != '') {
                    $('.designationOptions').html(`<option selected disabled>Choose a Designation</option>`);

                    // $('.designationSelect').css('display', 'block');
                    $.each(response, function(index, value){
                        // console.log(index);
                        // console.log(value);
                        // {{ old('department') == `+index+` ? 'selected' : '' }}
                        
                        $('.designationOptions').append(`<option class="innerDep" value="`+index+`">`+value+`</option>`);
                        $(".designationOptions").change(function() {
                            // $('.deleteDesignationBtn').css('display', 'block');

                            var designation = $('.designationOptions').val();
                            // console.log(designation);
                            $.ajax({
                                url: '{{route('hr.admin.departments.index')}}',
                                type: 'get',
                                dataType:'html',
                                data: {
                                    designation_id: designation,
                                },
                                success: function(e){
                                    $('.allResult').html(e);
                                }
                            });
                        })
                    });
                }
            }
        });
    })
    // $("#department").change(function() {
    //     var departmentId = $('#department').val();
    //     $.ajax({
    //         url: '{{route('hr.admin.departments.index')}}',
    //         type: 'get',
    //         dataType:'html',
    //         data: {
    //             department_id: departmentId,
    //         },
    //         success: function(e){
    //             $('.allResult').html(e);
    //         }
    //     });
    // })

    $('.addDesignation').click(function() {
        $.ajax({
            type:'POST',
            // dataType:'json',
            url: '{{route('hr.admin.designations.store')}}',
            data: {
                _token: $('#token').val(),
                designation_name: $('#designation_name').val(),
                department_id: $('#department').val(),
            },
            success: function(e) {
                $('.designationOptions').append(`<option value="`+e.id+`">`+e.designation_name+`</option>`)

                // console.log(e);
            }

        })
    })
</script>
@endsection
