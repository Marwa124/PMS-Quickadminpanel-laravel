
<div class="tab-pane sms-settings" id="v-pills-sms-settings" role="tabcard"
aria-labelledby="v-pills-details-tab">

    <div class="alert alert-info alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        @lang('settings.only_one_active_sms_gateway')
    </div>







<form action="{{ route('admin.save_sms') }}" method="post">

@csrf




{{-- <div class="card"> --}}


    {{-- <div class="card-body"> --}}




        
        <div class="card">
            <div class="card-header" id="heading">
              <h5 class="mb-0">
               @lang('settings.twilio')
              </h5>
            </div>

              <div class="card-body">

               

                  <div class="row">
  
                      <div class="col-md-3">
                          <label for="">@lang('settings.twilio_account_sid')</label>
                      </div>
                      <div class="col-md-9">
                          <input type="text"  class="form-control" name="twilio_account_sid" id="" value="{{ old('twilio_account_sid',settings('twilio_account_sid')) }}">
                      </div>
                  </div>


                  <div class="row">
  
                    <div class="col-md-3">
                        <label for="">@lang('settings.twilio_token_auth')</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text"  class="form-control" name="twilio_token_auth" id="" value="{{ old('twilio_token_auth',settings('twilio_token_auth')) }}">
                    </div>
                </div>

                <div class="row">
  
                    <div class="col-md-3">
                        <label for="">@lang('settings.twilio_phone_number')</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text"  class="form-control" name="twilio_phone_number" id="" value="{{ old('twilio_phone_number',settings('twilio_phone_number')) }}">
                    </div>
                </div>

                  
  
              
                  <div class="sms_gateway_active">
                  <div class="row">
  
                      <div class="col-md-3">
                          <label for="">@lang('settings.active')</label>
                      </div>
                      <div class="col-md-9">
                          <input type="hidden" name="sms_status" id="" value="off" >
                          <input onchange="check_single('twilio_checkbox','nexmo_checkbox')" class="twilio_checkbox" type="checkbox" name="sms_status" id="" value="twilio" @if(old('sms_status',settings('sms_status')) == 'twilio' ) {{ 'checked' }} @endif>
                      </div>
                  </div>
           



                </div>


                <div class="sms_twilio card-body no-br-tlr no-border-color">
                 

                    @if(settings('sms_status') == 'twilio') 
                            <div class=" card-heading">
                                <strong> @lang('settings.test_sms_config')</strong>
                            </div>
                            <div class="form-group">
                                 <div class="col-lg-6">
                        <input type="text" value="" placeholder="@lang('settings.phone')"
                                       class="form-control twilio-test-phone" data-id="twilio">
                                    </div></div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label"> @lang('settings.test_message')</label>
                                <div class="col-lg-6">
                                    <textarea class="form-control twilio-test-message" placeholder=" @lang('settings.test_message')" data-id="twilio" rows="4"></textarea>
                                </div></div>
                            <div class="form-group"><label class="col-lg-3 control-label"> @lang('')</label><div class="col-lg-6">
                                <button type="button" class="btn btn-info send-test-twilio-sms" onclick="event.preventDefault();send_test_sms('twilio')" data-id="twilio"> @lang('settings.send_test_sms')</button></div>
                                <div id="sms_test_response" data-id="twilio"></div>
                            </div>
                    @endif
               </div>


  
  
  
  
              </div>
          </div>





          <div class="card">
            <div class="card-header" id="heading">
              <h5 class="mb-0">
               @lang('settings.nexmo')
              </h5>
            </div>

              <div class="card-body">

               

                  <div class="row">
  
                      <div class="col-md-3">
                          <label for="">@lang('settings.nexmo_account_sid')</label>
                      </div>
                      <div class="col-md-9">
                          <input type="text"  class="form-control" name="nexmo_account_sid" id="" value="{{ old('nexmo_account_sid',settings('nexmo_account_sid')) }}">
                      </div>
                  </div>


                  <div class="row">
  
                    <div class="col-md-3">
                        <label for="">@lang('settings.nexmo_token_auth')</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text"  class="form-control" name="nexmo_token_auth" id="" value="{{ old('nexmo_token_auth',settings('nexmo_token_auth')) }}">
                    </div>
                </div>

                <div class="row">
  
                    <div class="col-md-3">
                        <label for="">@lang('settings.nexmo_phone_number')</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text"  class="form-control" name="nexmo_phone_number" id="" value="{{ old('nexmo_phone_number',settings('nexmo_phone_number')) }}">
                    </div>
                </div>

                  
  
              
                  <div class="sms_gateway_active">
                  <div class="row">
  
                      <div class="col-md-3">
                          <label for="">@lang('settings.active')</label>
                      </div>
                      <div class="col-md-9">
                          <input onchange="check_single('nexmo_checkbox','twilio_checkbox')" class="nexmo_checkbox" type="checkbox" name="sms_status" id="" value="nexmo" @if(old('sms_status',settings('sms_status')) == 'nexmo' ) {{ 'checked' }} @endif>
                      </div>
                  </div>
           



                </div>


                <div class="sms_nexmo card-body no-br-tlr no-border-color">
                 

                    @if(settings('sms_status') == 'nexmo') 
                            <div class=" card-heading">
                                <strong> @lang('settings.test_sms_config')</strong>
                            </div>
                            <div class="form-group">
                                 <div class="col-lg-6">
                        <input type="text" value="" placeholder="@lang('settings.phone')"
                                       class="form-control nexmo-test-phone" data-id="nexmo">
                                    </div></div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">@lang('settings.test_message')</label>
                                <div class="col-lg-6">
                                    <textarea class="form-control nexmo-test-message" placeholder="@lang('settings.test_message')" data-id="nexmo" rows="4"></textarea>
                                </div></div>
                            <div class="form-group"><label class="col-lg-3 control-label"> @lang('')</label><div class="col-lg-6">
                                <i  class="btn btn-info send-test-nexmo-sms" onclick="event.preventDefault();send_test_sms('nexmo')" data-id="nexmo"> @lang('settings.send_test_sms')</i></div>
                                <div id="sms_test_response" data-id="nexmo"></div>
                            </div>
                    @endif
               </div>


  
  
  
  
              </div>
          </div> 



{{--           
          <div class="card">
            <div class="card-header" id="heading">
              <h5 class="mb-0">
               @lang('settings.plivo')
              </h5>
            </div>

              <div class="card-body">

               

                  <div class="row">
  
                      <div class="col-md-3">
                          <label for="">@lang('settings.plivo_account_sid')</label>
                      </div>
                      <div class="col-md-9">
                          <input type="text"  class="form-control" name="plivo_account_sid" id="" value="{{ old('plivo_account_sid',settings('plivo_account_sid')) }}">
                      </div>
                  </div>


                  <div class="row">
  
                    <div class="col-md-3">
                        <label for="">@lang('settings.plivo_token_auth')</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text"  class="form-control" name="plivo_token_auth" id="" value="{{ old('plivo_token_auth',settings('plivo_token_auth')) }}">
                    </div>
                </div>

                <div class="row">
  
                    <div class="col-md-3">
                        <label for="">@lang('settings.plivo_phone_number')</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text"  class="form-control" name="plivo_phone_number" id="" value="{{ old('plivo_phone_number',settings('plivo_phone_number')) }}">
                    </div>
                </div>

                  
  
              
                  <div class="sms_gateway_active">
                  <div class="row">
  
                      <div class="col-md-3">
                          <label for="">@lang('settings.active')</label>
                      </div>
                      <div class="col-md-9">
                          <input onchange="check_single('plivo_checkbox','twilio_checkbox')" class="plivo_checkbox" type="checkbox" name="sms_status" id="" value="plivo" @if(old('sms_status',settings('sms_status')) == 'plivo' ) {{ 'checked' }} @endif>
                      </div>
                  </div>
           



                </div>


                <div class="sms_plivo card-body no-br-tlr no-border-color">
                 

                    @if(settings('sms_status') == 'plivo') 
                            <div class=" card-heading">
                                <strong> @lang('settings.test_sms_config')</strong>
                            </div>
                            <div class="form-group">
                                 <div class="col-lg-6">
                        <input type="text" value="" placeholder="@lang('settings.phone')"
                                       class="form-control plivo-test-phone" data-id="plivo">
                                    </div></div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">@lang('settings.test_message')</label>
                                <div class="col-lg-6">
                                    <textarea class="form-control plivo-test-message" placeholder="@lang('settings.test_message')" data-id="plivo" rows="4"></textarea>
                                </div></div>
                            <div class="form-group"><label class="col-lg-3 control-label"> @lang('')</label><div class="col-lg-6">
                                <i  class="btn btn-info send-test-plivo-sms" onclick="event.preventDefault();send_test_sms('plivo')" data-id="plivo"> @lang('settings.send_test_sms')</i></div>
                                <div id="sms_test_response" data-id="plivo"></div>
                            </div>
                    @endif
               </div>


  
  
  
  
              </div>
          </div>


              
          --}}


        


    <div class="card">
    <div class="card-body">

    <div class="p ">
          

        @forelse($triggers as $trigger_name => $trigger_opts) 

        

        <b for="">{{ $trigger_opts['label'] }}</b>

        @if (isset($trigger_opts['info']) && $trigger_opts['info'] != '')
        
          <p class="text-sm">{{ $trigger_opts['info'] }}</p>
        @endif

         <div class="">
                 <textarea class="form-control" name="{{ $trigger_name }}">{{ old($trigger_name ,settings($trigger_name)) }}</textarea>
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
    {{-- </div> --}}

{{-- </div>  --}}
</form>

    

</div>


