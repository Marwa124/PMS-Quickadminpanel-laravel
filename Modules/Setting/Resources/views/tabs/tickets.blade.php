<div class="tab-pane active show proposal" id="v-pills-proposal" role="tabcard"
aria-labelledby="v-pills-details-tab">
<div class="card  card-custom">
   <h5 class="card-header " style="text-align: left">  
      
         
               @lang('settings.tickets_settings')
              
        
      
   </h5>
   <div class="card-body">


    <form action="{{ route('admin.tickets.settings.store') }}" method="POST" >
        @csrf
            <header class="card-heading  "><?= trans('settings.tickets_settings') ?></header>

                <div class="row">
                    <label class="col-lg-3 control-label"><?= trans('settings.default_department') ?></label>
                    <div class="col-lg-5">
                        <select name="default_department" style="width: 100%" class="form-control select2">
                 
                            @forelse($departments as $department)
                                    <option
                                        value="{{ $department->id }}" @if(old('default_department',settings('default_department')) == $department->id) {{ 'selected' }} @endif  > {{ $department->department_name }}  </option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                
                <div class="row">

                    <label class="col-lg-3 control-label"><?= trans('settings.default_status') ?></label>
                    <div class="col-lg-5">
                        <select name="default_status" class="form-control select2">


                            @forelse($status as $statue)

                            <option
                            value="{{ $statue->status_en }}" @if( old('default_status',settings('default_status')) == $statue->status_en)  {{ 'selected' }}  @endif >{{ app()->getLocale() == 'en' ? ucfirst($statue->status_en ) : $statue->status_ar }}</option>
                            @empty

                            @endforelse
                          
                           
                        </select>
                    </div>
                </div>
                <div class="row">

                    <label class="col-lg-3 control-label"><?= trans('settings.default_priority') ?></label>
                    <div class="col-lg-5">
     

                    <select name="default_priority" class="form-control select2">


                        @forelse($priorities as $priority)

                        <option
                        value="{{ $priority->id }}" @if( old('default_priority',settings('default_priority')) == $priority->priority_en)  {{ 'selected' }}  @endif >{{ app()->getLocale() == 'en' ? ucfirst($priority->priority_en) : $priority->priority_ar }}</option>
                        @empty

                        @endforelse
                    
                    
                    </select>
                    </div>
                    <div class="col-lg-2">
                        <a data-toggle="modal" data-target="#priorityModal"
                           href=""
                           class=""><?= trans('settings.new') . ' ' . trans('settings.priority') ?></a>
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-3 control-label"><?= trans('settings.notify_ticket_reopened') ?></label>
                    <div class="col-lg-6">
                        <div class="checkbox c-checkbox">
                            <label class="needsclick">

                                <input type="hidden" name="notify_ticket_reopened" value="no">
                                
                                <input type="checkbox"
                                @if(old('notify_ticket_reopened',settings('notify_ticket_reopened')) == 'yes') {{ 'checked' }} @endif
                                 name="notify_ticket_reopened">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <header class="card-heading  "><?= trans('settings.leads_settings') ?></header>
                    <div class="card-body">
                        <div class="row">
                            <label
                                class="col-lg-3 control-label"><?= trans('settings.default') . ' ' . trans('settings.source') ?></label>
                            <div class="col-lg-5">
                                <select name="default_leads_source" style="width: 100%"
                                        class="form-control select2">

                                        @forelse($lead_sources as $l_source)
                                            <option value="{{ $l_source->id }}"> {{ app()->getLocale() == 'en' ? ucfirst($l_source->lead_source) : $l_source->lead_source_ar }}</option>
                                        @empty
                                            
                                        @endforelse
                             {{-- lead source here --}}
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <a href=""
                                   class=""><?= trans('settings.new') . ' ' . trans('settings.source') ?></a>
                            </div>
                        </div>
                        <div class="row">
                            <label
                                class="col-lg-3 control-label"><?= trans('settings.default') . ' ' . trans('settings.status') ?></label>
                            <div class="col-lg-5">
                                <select name="default_lead_status" style="width: 100%"
                                        class="form-control select2">
                              
                                         
                               

                         @forelse($leads_status as $l_status)
                         <option
                         value="{{ $l_status->id }}"
                         @if(old('default_lead_status',settings('default_lead_status')) == $l_status->id) {{ 'selected' }} @endif >
                         {{ app()->getLocale() == 'en' ? $l_status->name_en : $l_status->name_ar }}
                          </option>
                         @empty
                             
                         @endforelse           
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <a href=""
                                   class=""><?= trans('settings.new') . ' ' . trans('settings.leads_status') ?></a>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div class="row">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-sm btn-primary"><?= trans('settings.save_changes') ?></button>
                    </div>
                </div>
                </form>





  
  <!-- Modal -->
  <div class="modal fade" id="priorityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#manage"
                  data-toggle="tab"> @lang('settings.priorities')</a>
                </li>
                <li class=""><a href="#create"
                  data-toggle="tab"> @lang('settings.new_priority') </a>
                </li>
            </ul> 
       
        </div>
        <div class="modal-body">
            <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
           
                <div class="tab-content bg-white">
                    <!-- ************** general *************-->
                    <div class="tab-pane active" id="manage">
                        <div class="table-responsive">
                            <table class="table table-striped DataTables" id="DataTables">
                                <thead>
                                <tr>
                                    <th>@lang('settings.priorities')</th>
                                    <th class="col-options no-sort">@lang('action')</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @forelse($priorities as $priority)

                                    <tr>
                                        <td>{{  app()->getLocale() == 'en' ? ucfirst($priority->priority_en) : $priority->priority_ar  }}</td>
                                        <td>
                                            <form onsubmit="return delete_priority();" id="priority_{{ $priority->id }}" action="{{ route('admin.tickets.priority.delete') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value={{ $priority->id }}>
                                              <button  class="btn btn-"type="submit" ><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                        
                                    @empty
                                        
                                    @endforelse
                             
            
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane " id="create">
                        <form role="form"  action="{{ route('admin.tickets.priority.store') }}" method="post" class="form-horizontal  ">
                              @csrf
                            <div class="row">
                                <label class="col-lg-3 control-label">
                                    <span
                                        class="text-danger">@lang('settings.priority_en')</span>*</span></label>
                                <div class="col-lg-5">
                                    <input type="text" name="priority_en" class="form-control" value="">
                                </div>
                               
                            </div>

                            <div class="row">
                                <label class="col-lg-3 control-label">
                                    <span
                                        class="text-danger">@lang('settings.priority_ar')</span>*</span></label>
                           
                                <div class="col-lg-5">
                                    <input type="text" name="priority_ar" class="form-control" value="">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-lg-3 control-label"></label>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-purple">@lang('settings.upload')</button>
                                    <button type="button" class="btn btn-primary pull-right"
                                            data-dismiss="modal">@lang('settings.close')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>

      </div>
    </div>
  </div>









  
      
    </div>
</div>
</div>

@push('settings')
<script>

  function delete_priority(){
      if (confirm('are you sure')){
       return true;
      }else{
          return false;
      }
  }
</script>
@endpush