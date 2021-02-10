@extends('layouts.admin')
@section('content')
<div class="row">
     {{-- @can('leave_application_create') --}}
     <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success"  data-toggle="modal" data-target="#modal_Add">
                {{ trans('global.add') }} {{ trans('cruds.lead.title_singular') }}
            </a>
        </div>
    </div>
{{-- @endcan --}}
   
</div>
 {{-- @can('leave_application_delete') --}}
 <div class="card">
    <div class="card-body">
        <div class="row">
            {{-- <div class="col-md-4">
                <select data-column="0" class="form-control filter-select" name="trashed" id="">
                    <option value="0">Active</option>
                    <option value="1">Trashed Leaves</option>
                </select>
            </div> --}}

            <div class="col-md-4">
                <div class="form-group">
                    <h5>Date <span class="text-danger"></span></h5>
                    <div class="controls">

                        <input type="date" name="created_at" id="createdsearch"
                            class="form-control datepicker-autoclose" placeholder="Please select date">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <h5>Type<span class="text-danger"></span></h5>

                    <div class="controls">
                        <select class="form-control" id="typesearch" name="type_id">
                            <option value="" selected></option>
                            @if(!empty($types))
                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                            @endif
                        </select>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Product<span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="text" name="product" id="productsearch" class="form-control" placeholder="product">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <h5>Client<span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="text" name="client" id="clientsearch" class="form-control" placeholder="client">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>company<span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="text" name="company" id="companysearch" class="form-control" placeholder="company">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>URL<span class="text-danger"></span></h5>

                    <div class="controls">
                        <input type="text" name="url" id="urlsearch" class="form-control" placeholder="url">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <h5>Phone 1<span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="text" name="phone_1" id="phone_1_search" class="form-control"
                            placeholder="phone_1">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Phone 2<span class="text-danger"></span></h5>
                    <div class="controls">
                        <input type="text" name="phone_2" id="phone_2_search" class="form-control"
                            placeholder="phone_2">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Email<span class="text-danger"></span></h5>

                    <div class="controls">
                        <input type="text" name="email" id="emailsearch" class="form-control" placeholder="email">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>first call By<span class="text-danger"></span></h5>

                    <div class="controls">
                        <input type="text" name="callby" id="callbysearch" class="form-control" placeholder="callby">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h5>WAY OF Communication<span class="text-danger"></span></h5>
                <div class="form-group">
                    <select class="form-control" id="way_of_commsearch" name="way_of_communication">
                        <option value=" " selected></option>
                        <option value="Direct Call">Direct Call</option>
                        <option value="Whatsapp">Whatsapp</option>
                        <option value="SMS">SMS</option>
                        <option value="E Mail">E Mail</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <h5>DATE CONTACTED<span class="text-danger"></span></h5>
                <div class="form-group">
                    <div class="controls">
                        <input type="date" name="contacted" id="contactedsearch"
                            class="form-control datepicker-autoclose" placeholder="Please Select Date Contacted">

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Contacted?<span class="text-danger"></span></h5>
                <div class="form-group">
                    <div class="controls">
                        <input type="text" name="contacedresult" id="contacedresultsearch" class="form-control"
                            placeholder="contacedresult">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h5>1st assgin<span class="text-danger"></span></h5>
                <div class="form-group">
                    <div class="controls">
                        <input type="text" name="assign_1" id="assign_1_search" class="form-control"
                            placeholder="1st assgin">
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-4">
                <h5>2st assgin<span class="text-danger"></span></h5>
                <div class="form-group">
                    <div class="controls">
                        <input type="text" name="assign_2" id="assign_2_search" class="form-control"
                            placeholder="2st assgin">
                    </div>
                </div>
            </div> -->
            <div class="col-md-4">
                <h5>Priority<span class="text-danger"></span></h5>
                <div class="form-group">
                    <select class="form-control" id="prioritysearch" name="priority">
                        <option value=" " selected></option>
                        <option value="URGENT">URGENT</option>
                        <option value="NORMAL">NORMAL</option>
                        <option value="LOW">LOW</option>
                        <option value="VIP">VIP</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12">


                <div class="text-left" style=" margin-left: 15px;">
                    <button type="text" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button>
                    <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                </div>

                <br>
            </div>
        </div>
    </div>
</div>
{{-- @endcan --}}
  <div class="card">
    <div class="card-body">
    <div class="row">
        <div class=" col-md-6">
            <label for="controls">User</label>
            <select class="form-control assign_lead_list" name="user">
                <option selected disabled>Select</option>
                @foreach($users as $user)
                 @if(!empty($user->accountDetail))
                
                <option value="{{$user->accountDetail->user_id}}">{{$user->accountDetail->fullname}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <div class="form-group mr-5">
                <button type="button" class="btn btn-info" id="assignlead" disabled="true">Assign Leads</button>
            </div>
        </div>
    </div>
    </div>

  </div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.leaveApplication.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        
        <table class="table table-bordered table-hover  datatable datatable-LeaveApplication">
            <thead>
                <tr>
                    <th>  {{ trans('cruds.lead.fields.id') }}</th>
                    <th>  {{ trans('cruds.lead.fields.Date') }}</th>
                    <th>  {{ trans('cruds.lead.fields.Client_Name') }}</th> 
                     <th> {{ trans('cruds.lead.fields.Type') }}</th>
                    <th>  {{ trans('cruds.lead.fields.Product') }}</th>
                    <th>  {{ trans('cruds.lead.fields.Company') }}</th> 
                     <th> {{ trans('cruds.lead.fields.WWW') }}</th>
                     <th> {{ trans('cruds.lead.fields.Phone_1') }}</th>
                     <th> {{ trans('cruds.lead.fields.Phone_2') }}</th>
                     <th> {{ trans('cruds.lead.fields.Email') }}</th>
                     <th>  {{ trans('cruds.lead.fields.first_call_By') }}</th>
                     {{-- <th>  {{ trans('cruds.lead.fields.firstCall_result') }}</th> --}}
                     <th>  {{ trans('cruds.lead.fields.second_call_By') }}</th>
                     <th>  {{ trans('cruds.lead.fields.1st_assgin') }}</th>
                     <th>  {{ trans('cruds.lead.fields.2st_assgin') }}</th>
                     <th>  {{ trans('cruds.lead.fields.WAY_OF_Communication') }}</th>
                    <th>  {{ trans('cruds.lead.fields.DATE_CONTACTED') }}</th>
                    <th>  {{ trans('cruds.lead.fields.Contacted?') }}</th>
                    <th>  {{ trans('cruds.lead.fields.NEXT_ACTION_DATE') }}</th>
                    <th>  {{ trans('cruds.lead.fields.Note') }}</th>
                    <th>  {{ trans('cruds.lead.fields.Priority') }}</th>
                    <th>{{ trans('global.action') }}</th> 
                </tr>
            </thead>

        </table>
    </div>

    {{--***********************create model******************************--}}

    <!-- Modal -->

    <div class="modal fade bd-example-modal-lg" id="modal_Add" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Lead</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="{{route('sales.admin.leads.store')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        @include('sales::admin.leads.form', ['codes' => $codes,'types'=>$types])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Modal -->

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Lead</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="{{route('sales.admin.leads.update','')}}" method="post" id="leadedit">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        @include('sales::admin.leads.edit', ['codes' => $codes,'types'=>$types])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->


{{--***********************end create ******************************--}}

</div>



@endsection
@section('scripts')
@parent
   <script>
            $('#exampleModal').on('show.bs.modal', function (event) {
                // alert('hello');
                var button = $(event.relatedTarget) // Button that triggered the modal
                var client_id_on_pms = $('#sara').data('client_id_on_pms') // Extract info from data-* attributes
                var type_id = button.data('type_id') // Extract info from data-* attributes
                var product = button.data('product') // Extract info from data-* attributes
                var company = button.data('company') // Extract info from data-* attributes
                var site_url = button.data('site_url') // Extract info from data-* attributes
                var phone1 = button.data('phone1') // Extract info from data-* attributes
                var phone2 = button.data('phone2') // Extract info from data-* attributes
                var email = button.data('email') // Extract info from data-* attributes
                var way_of_communication = button.data(
                    'way_of_communication') // Extract info from data-* attributes
                var contacted_date = button.data('contacted_date') // Extract info from data-* attributes
                var notes = button.data('notes') // Extract info from data-* attributes
                var next_action_date = button.data('next_action_date') // Extract info from data-* attributes
                var priority = button.data('priority') // Extract info from data-* attributes
                var client_name = button.data('client_name') // Extract info from data-* attributes
                var contracted = button.data('contracted') // Extract info from data-* attributes
                var action = button.data('action') // Extract info from data-* attributes

                var modal = $(this)
                modal.find('#client_id_on_pms').val(client_id_on_pms)
                modal.find('#product').val(product)
                modal.find('#client_name').val(client_name)
                modal.find('#company').val(company)
                modal.find('#site_url').val(site_url)
                modal.find('#phone1').val(phone1)
                modal.find('#phone2').val(phone2)
                modal.find('#email').val(email)
                modal.find('#contacted_date').val(contacted_date)
                modal.find('#notes').val(notes)
                modal.find('#next_action_date').val(next_action_date)
                modal.find('#type_id').val(type_id).change()
                modal.find('#contracted').val(contracted).change()
                modal.find('#way_of_communication').val(way_of_communication).change()
                modal.find('#priority').val(priority).change()
                modal.find('#leadedit').attr('action', function (i, old) {
                    return action;
                });
            });

        </script>
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
{{-- @can('leave_application_delete') --}}
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('sales.admin.leads.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
{{-- @endcan --}}

// {{-- assign leads  --}}
{{-- @can('leave_application_delete') --}}


$(".assign_lead_list").change(function(){
    var dt = $('.datatable-LeaveApplication').DataTable();
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });
    
      if (ids.length !== 0) {
       $("#assignlead").prop( "disabled", false )
      }
      

  })
  $("#assignlead").click(function (e) {
    var dt = $('.datatable-LeaveApplication').DataTable();
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });
    
      if (ids.length !== 0) {
        var userlent=$('.assign_lead_list').find(":selected").val();
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: "{{ route('sales.admin.leads.assignPost') }}",
          data: { ids: ids,user:userlent, _method: 'post' }})
          .done(function () { location.reload() }).error(
              function() {
                  
              }
          );
      }

  });


{{-- @endcan --}}
// {{-- end assign leads  --}}

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    scrollX:true,
    fixedHeader: true,
    aaSorting: [],
    ajax: {
        url: "{{ route('sales.admin.leads.getdata') }}",
        type: 'get',
            data: function (d) {
                d.company = $('#companysearch').val();
                d.created_at = $('#createdsearch').val();
                d.type = $('#typesearch').find(":selected").val();
                d.product = $('#productsearch').val();
                d.client = $('#clientsearch').val();
                d.url = $('#urlsearch').val();
                d.phone_1 = $('#phone_1_search').val();
                d.phone_2 = $('#phone_2_search').val();
                d.email = $('#emailsearch').val();
                d.callby = $('#callbysearch').val();
                d.way_of_comm = $('#way_of_commsearch').find(":selected").val();
                d.contacted = $('#contactedsearch').val();
                d.contacedresult = $('#contacedresultsearch').val();
                d.assign_1_search = $('#assign_1_search').val();
                d.prioritysearch = $('#prioritysearch').find(":selected").val();
                d.assign_2_search = $('#assign_2_search').val();
            }
    },
    // ajax: "{{ route('hr.admin.leave-applications.index') }}",
    columns: [
            
            { data: 'id'},
            { data: 'created_at'},
            { data: 'client_name'},
            { data: 'type', name: 'type.name'},
            //  {name : 'type.name',data : 'type.name',orderable : true,searchable : true,},
            { data: 'product'},
            { data: 'company' },
            { data: 'site_url'},
            { data: 'phone1'},
            { data: 'phone2'},
            { data: 'email'},
            { data: 'firstCall', name: 'firstCall.call_by'},
            // { data: 'firstCall_result'},
            { data: 'secondCall', name: 'secondCall.call_by'},
            { data: 'addby', name: 'addby.fullname'},
            { data: 'secondassign', name: 'secondassign.leaduser.fullname',orderable : false,searchable : false},
            { data: 'way_of_communication'},
            { data: 'contacted_date' },
            { data: 'contracted'},
            { data: 'next_action_date'},
            { data: 'notes'},
            { data: 'priority'},
            { data: 'actions'}
    ],
    // orderCellsTop: true,
    order: [[ 0, 'desc' ]],
    pageLength: 10,
    createdRow: (row, data, dataIndex, cells) => {
        $(cells[6]).css('background-color', data.status_color)
    },
  };

 
  let table = $('.datatable-LeaveApplication').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('#btnFiterSubmitSearch').click(function (e) {
    e.preventDefault();
    $('.datatable-LeaveApplication').DataTable().draw(true);
    // console.log($('#typesearch').find(":selected").val());
});

$('#reset').click(function () {
    $('#companysearch').val('');
    $('#createdsearch').val('');
    $('#typesearch').val('');
    $('#productsearch').val('');
    $('#urlsearch').val('');
    $('#phone_1_search').val('');
    $('#phone_2_search').val('')
    $('#emailsearch').val('')
    $('#callbysearch').val('')
    // $('#way_of_commsearch').find(":selected").val()
    $('#contactedsearch').val('')
    $('#contacedresultsearch').val('')
    $('#assign_1_search').val('')
    // $('#prioritysearch').find(":selected").val()
    $('#assign_2_search').val('')
    $("select option").prop("selected", false)
    $('.datatable-LeaveApplication').DataTable().draw(true);
});

 
});

</script>
@endsection
