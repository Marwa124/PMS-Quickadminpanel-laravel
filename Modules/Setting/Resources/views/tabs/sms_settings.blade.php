
<div class="tab-pane sms-settings" id="v-pills-sms-settings" role="tabcard"
aria-labelledby="v-pills-details-tab">
@if($total_gateways > 1)
    <div class="alert alert-info alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        @lang('settings.only_one_active_sms_gateway')
    </div>
@endif






<form action="{{ route('admin.save_sms') }}" method="post">

@csrf




<div class="card">


    <div class="card-body">



        @forelse($gateways as $name => $gateway)

        
        <div class="card">
            <div class="card-header" id="heading{{ $loop->index }}">
              <h5 class="mb-0">
               {{  ucfirst($name) }}
              </h5>
            </div>

              <div class="card-body">

                @forelse($gateway['options'] as $g_option)

                  <div class="row">
  
                      <div class="col-md-3">
                          <label for="">{{ $g_option['label'] }}</label>
                      </div>
                      <div class="col-md-9">
                          <input type="text"  class="form-control" name="{{ $g_option['name'] }}" id="" value="{{ old($g_option['name'],$g_option['value']) }}">
                      </div>
                  </div>
  
  
                  @empty

                  @endforelse
              
                  <div class="sms_gateway_active">
                  <div class="row">
  
                      <div class="col-md-3">
                          <label for="">@lang('settings.active')</label>
                      </div>
                      <div class="col-md-9">
                          {{-- <input type="hidden" name="{{ $name }}_status" id="" value="off" > --}}
                          <input type="checkbox" name="{{ $name }}_status" id="" value="{{  $name}}" @if(old($name .'_status',settings($name . '_status')) == 'on' ) {{ 'checked' }} @endif>
                      </div>
                  </div>
           



                </div>


                <div id="sms_{{ $name }}"
                class="card-collapse collapse @if(settings($name . '_status') == 1 || $total_gateways == 1) {{ 'in' }} @endif"
                 role="tabcard" aria-labelledby="heading{{$name  }}">
               <div class="card-body no-br-tlr no-border-color">
                 

                   @if(settings($name . '_status') == '1') 
                      <div class="card card-custom">
                       <div class=" card-heading"><strong> @lang('settings.test_sms_config')</strong></div>
                      <div class="form-group"><label class="col-lg-3 control-label"> @lang('settings.enter')  @lang('settings.phone')  @lang('settings.number')</label><div class="col-lg-6"><input type="text" value="" placeholder=" @lang('enter')  @lang('phone')  @lang('number')" class="form-control test-phone" data-id="{{ $name}}"></div></div>
                      <div class="form-group"><label class="col-lg-3 control-label"> @lang('settings.test_message')</label><div class="col-lg-6"><textarea class="form-control sms-gateway-test-message" placeholder=" @lang('settings.test_message')" data-id="{{ $name }}" rows="4"></textarea></div></div>
                      <div class="form-group"><label class="col-lg-3 control-label"> @lang('')</label><div class="col-lg-6"><button type="button" class="btn btn-info send-test-sms" data-id="{{ $name }}"> @lang('settings.send_test_sms')</button></div>
                      <div id="sms_test_response" data-id="{{ $name }}"></div></div>
                 @endif
               </div>
               </div>
             </div>
  
  
  
  
              </div>
          </div>






         
    
    @empty
    @endforelse


    <div class="card">
    <div class="card-body">

    <div class="p ">
          

        @forelse($triggers as $trigger_name => $trigger_opts) 
         @php

         $label = '<b>' . $trigger_opts['label'] . '</b>';
         if (isset($trigger_opts['info']) && $trigger_opts['info'] != '') {
             $number_input = null;
             if (!empty($trigger_opts['sms_number'])) {
                 $number_input = '<input class="form-control" style="width:20%;display:initial;height:22px;color:red" value="' . $trigger_opts['sms_number'] . '" type="text" name="' . $trigger_name . '_sms_number">';
             }
             $label .= '<p class="text-sm">' . $trigger_opts['info'] . ' ' . $number_input . '</p>';
         }
         @endphp
         <?= $label ?>
         <div class="">
                 <textarea class="form-control" name="{{ trigger_option_name($trigger_name) }}">
                     @if (!empty($trigger_opts['value'])) 
                         {{ $trigger_opts['value'] }}
                     @endif

                 </textarea>
                 <a style="cursor:pointer;margin-top:10px;" onclick="slideToggle('sms_merge_fields_{{ $trigger_name  }}')" class="pull-right"><small>@lang('settings.available_merge_fields') </small></a>

         </div>


       
        @php  $merge_fields = ''; @endphp

         @foreach ($trigger_opts['merge_fields'] as $merge_field)
            @php $merge_fields .= $merge_field . ', ' ; @endphp
         @endforeach  
         
         

         @if($merge_fields != '')
             <div id="sms_merge_fields_{{ $trigger_name }}" style="display:none;" class="mt">
                   {{ substr($merge_fields, 0, -2) }}
            </div>
         @endif
         
     @empty    
    @endforelse
 </div>


</div>
</div>

        


    
<div class="row">
           
    <div class="col-md-7">
        
        <button  formaction="{{ route('admin.save_sms') }}" style="padding: 6px;border-radius: 0px;"  class="btn btn-sm btn-primary">@lang('settings.save_changes')</button>
    </div>
</div> 
    </div>

</div> 
</form>

    

</div>





