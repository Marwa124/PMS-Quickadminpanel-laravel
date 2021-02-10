
<div class="tab-pane company-system" id="v-pills-company-system" role="tabpanel"
aria-labelledby="v-pills-details-tab">



<div class="card  card-custom">
   <h5 class="card-header " style="text-align: left">  
      
         
               @lang('settings.company_details')
                    
      
   </h5>
   <div class="card-body">


    <form  id="system" action="{{ route('admin.system.store') }}" method="POST">
        @csrf
                   <div class="col-md-12">




                                    
                    <div class="row">
                                <div class="col-md-2"> 
                                    <label  class="font-bold"> @lang('settings.default_language')</label>
                                </div>
                                <div class="col-md-5">
                                    
                                    <select class="form-control select_box select2" style="width:100%" name="default_language">
            
                                         <option
                                            value="" >
                                            @lang('settings.default_language')
                                         </option>
                                            @forelse ($languages as $language)
                                            <option  {{ old('default_language',settings('default_language')) == $language->name ? 'selected' : ''}} value="{{ $language->name }}"> {{ $language->name }}</option>
                                            @empty
                                            
                                        @endforelse
                                    </select>                                
                                  </div>
                    
                    
                    </div> 





                    
                                    
                    <div class="row">
                        <div class="col-md-2"> 
                            <label  class="font-bold"> @lang('settings.locale')</label>
                        </div>
                        <div class="col-md-5">
                            
                            <select class="form-control select_box select2" style="width:100%" name="locale">
    
                                <option
                                value="" >
                                @lang('settings.locale')
                             </option>
                                @forelse ($locales as $locale)
                                <option  {{ old('locale',settings('locale')) == $locale->locale ? ' selected' : ''}} value="{{ $locale->locale }}"> {{ $locale->name }}</option>
                                @empty
                                
                                @endforelse
                            {{-- </optgroup> --}}
                        </select>                                
                    </div>
                    
                    
                    </div> 


                    <div class="row">
                        <div class="col-md-2"> 
                            <label  class="font-bold"> @lang('settings.timezone')</label>
                        </div>
                        <div class="col-md-5">
                            
                            <select class="form-control select_box select2" style="width:100%" name="timezone">
    
                                <option
                                value="" >
                                @lang('settings.timezone')
                             </option>
                                @forelse ($timezones as $timezone => $description)
                                <option  {{ old('timezone',settings('timezone')) == $timezone ? 'selected' : ''}} value="{{ $timezone  }}"> {{ $description }}</option>
                                @empty
                                
                                @endforelse
                            {{-- </optgroup> --}}
                        </select>                                
                    </div>

         
                    
                    
                    </div> 





             

                        @include('setting::partials.currency.add')
                        @include('setting::partials.currency.table')

                     

          


                    <div class="row">
                        <div class="col-md-2"> 
                            <label  class="font-bold"> @lang('settings.default_currency')</label>
                        </div>
                        <div class="col-md-5">
                            
                            <select class="form-control select_box select2" style="width:100%" name="default_currency">
        
                                    <option
                                        value="" >
                                        @lang('settings.default_currency')
                                    </option>
                                    @forelse ($currencies as $currency)
                                    <option  {{ old('default_currency',settings('default_currency')) == $currency->code  ? ' selected' : ''}} value="{{ $currency->code   }}"> {{ $currency->name  }}</option>
                                    @empty
                                    
                                    @endforelse
                         
                              </select>                                
                         </div>

                        <div class="col-md-3">
                            <span 
                             data-toggle="modal" data-target="#addCurrency"
                             style="
                            color: #fff;
                            background-color: #27c24c;
                            padding: 6px;
                            text-align: center;
                            cursor: pointer;
                            ">
                            <i style="margin-top: 13px;" class="fa fa-plus text-white" ></i>
                        </span > 
                        <span
                        data-toggle="modal" data-target="#tableCurrency"

                        style="
                        color: #fff;
                        background-color: #6153e2;
                        padding: 6px;
                        text-align: center;
                        cursor: pointer;"
                        >
                            <i class="fa fa-list-alt text-white"  ></i>
                        </span> 


                        </div>
                    
                    
                    </div> 




                    <div class="row">
                        <div class="col-md-2"> 
                            <label  class="font-bold"> @lang('settings.currency_position')</label>
                        </div>
                        <div class="col-md-5">
                            
                            <select class="form-control select_box" style="width:100%" name="currency_position">
    
                                <option
                                value="" >
                                @lang('settings.currency_position')
                             </option>
                                
                                <option  {{ old('currency_position',settings('currency_position')) == 'right'  ? ' selected' : ''}} value="right"> @lang('settings.right') </option>
                                <option  {{ old('currency_position',settings('currency_position')) == 'left'  ? ' selected' : ''}} value="left">  @lang('settings.left')  </option>
                              
                                
                              
                        </select>                                
                    </div>
                    
                    
                    </div> 


                    <div class="row">

              
                          
                        <div class="col-md-2"> 
                            <label  class="font-bold"> @lang('settings.default_tax')</label>
                        </div>
                        <div class="col-md-5">

                            <select name="default_tax[]" class="select2" id="" multiple="multiple">
 

                                @forelse ($taxes as $tax)



                                    <option @if(in_array(  $tax->id,old('default_tax',$default_tax) ) ){{ 'selected ' }}@endif value="{{$tax->id}}" >

                                    {{ $tax->rate_percent}} % {{ $tax->name }}
                                    
                                    </option>                                   
                                @empty
                                    
                                @endforelse
                            </select>
                                
               
                    </div>
                    
                    
                    </div> 

                    <div class="row">

              
                          
                        <div class="col-md-2"> 
                            <label  class="font-bold"> @lang('settings.tables_pagination_limit')</label>
                        </div>
                        <div class="col-md-5">

                            <input type="text" class="form-control" value="{{ old('tables_pagination_limit',settings('tables_pagination_limit') ) }}" name="tables_pagination_limit">

               
                    </div>


  
                    
                    
                    </div> 
                    <div class="row">

              
                          
                        <div class="col-md-2"> 
                            <label  class="font-bold"> @lang('settings.date_format')</label>
                        </div>
                        <div class="col-md-5">

                                    <select name="date_format" class="select2">
                                        <option value="" > @lang('settings.date_format') </option>
                                        <option value="%d-%m-%Y" @if(old('date_format',settings('date_format')) == "%d-%m-%Y") {{ 'selected'  }} @endif > <?= strftime("%d-%m-%Y", time()) ?></option>
                                        <option value="%m-%d-%Y" @if(old('date_format',settings('date_format')) == "%m-%d-%Y") {{ 'selected'  }} @endif > <?= strftime("%m-%d-%Y", time()) ?></option>
                                        <option value="%Y-%m-%d" @if(old('date_format',settings('date_format')) == "%Y-%m-%d") {{ 'selected'  }} @endif > <?= strftime("%Y-%m-%d", time()) ?></option>
                                        <option value="%d-%m-%y" @if(old('date_format',settings('date_format')) == "%d-%m-%y") {{ 'selected'  }} @endif   ><?= strftime("%d-%m-%y", time()) ?></option>
                                        <option value="%m-%d-%y" @if(old('date_format',settings('date_format')) == "%m-%d-%y") {{ 'selected'  }} @endif   ><?= strftime("%m-%d-%y", time()) ?></option>
                                        <option value="%m.%d.%Y" @if(old('date_format',settings('date_format')) == "%m.%d.%Y") {{ 'selected'  }} @endif   ><?= strftime("%m.%d.%Y", time()) ?></option>
                                        <option value="%d.%m.%Y" @if(old('date_format',settings('date_format')) == "%d.%m.%Y") {{ 'selected'  }} @endif   ><?= strftime("%d.%m.%Y", time()) ?></option>
                                        <option value="%Y.%m.%d" @if(old('date_format',settings('date_format')) == "%Y.%m.%d") {{ 'selected'  }} @endif   ><?= strftime("%Y.%m.%d", time()) ?></option>
                                    </select>
               
                       </div>


  
                    
                    
                    </div> 
                    
                    <div class="row">

              
                          
                        <div class="col-md-2"> 
                            <label  class="font-bold"> @lang('settings.time_format')</label>
                        </div>
                        <div class="col-md-5">

                            <select name="time_format" class="select2" id="">
                                <option value="">@lang('settings.time_format')</option>
                                <option @if(old('time_format',settings('time_format')) == 'g:i a'  ) {{ 'selected' }} @endif  value="g:i a">{{ date("g:i a") }}</option>
                                <option @if(old('time_format',settings('time_format')) == 'g:i A'  ) {{ 'selected' }} @endif  value="g:i A">{{ date("g:i A") }}</option>
                                <option @if(old('time_format',settings('time_format')) == 'H:i'  ) {{ 'selected' }} @endif  value="H:i">{{ date("H:i") }}</option>

                       
                            </select>


                        </div>
               
                       </div>


                    <div class="row">

              
                          
                        <div class="col-md-2"> 
                            <label  class="font-bold"> @lang('settings.money_format')</label>
                        </div>
                        <div class="col-md-5">


                            <select name="money_format" class="select2" id="">
                                <option value="">@lang('settings.money_format')</option>
                                <option value="1" @if(old('money_format',settings('money_format')) == 1 )  {{ 'selected' }} @endif>{{ "1,234." . $decimal }}</option>
                                <option value="2"  @if(old('money_format',settings('money_format')) == 2 )  {{ 'selected' }} @endif>{{"1.234," . $decimal}}</option>
                                <option value="3"  @if(old('money_format',settings('money_format')) == 3 )  {{ 'selected' }} @endif>{{"1234." . $decimal}}</option>
                                <option value="4"  @if(old('money_format',settings('money_format')) == 4 )  {{ 'selected' }} @endif>{{"1234," . $decimal}}</option>
                                <option value="5"  @if(old('money_format',settings('money_format')) == 5 )  {{ 'selected' }} @endif>{{"1'234." . $decimal}}</option>
                                <option value="6"  @if(old('money_format',settings('money_format')) == 6 )  {{ 'selected' }} @endif>{{"1 234." . $decimal}}</option>
                                <option value="7"  @if(old('money_format',settings('money_format')) == 7 )  {{ 'selected' }} @endif>{{"1 234," . $decimal}}</option>
                                <option value="8"  @if(old('money_format',settings('money_format')) == 8 )  {{ 'selected' }} @endif>{{"1 234'" . $decimal}}</option>

                       
                            </select>




                        </div>

                        <div class="col-md-2">

                            <input type="text" class="form-control pt0 pb0" name="decimal_separator" value="{{ old('decimal_separator',session('decimal_separator',2))  }}">

                        </div>
               
                       </div>


                       
                       <div class="row">

             
                         
                       <div class="col-md-2"> 
                           <label  class="font-bold"> @lang('settings.allowed_files')</label>
                       </div>
                       <div class="col-md-7">



                           <input type="text" class="form-control" value="{{ old('allowed_files',settings('allowed_files')) }}" name="allowed_files" placeholder="@lang('settings.separate_using_exte')">



                       </div>

              
                      </div>


                       <div class="row">

             
                         
                       <div class="col-md-2"> 
                           <label  class="font-bold"> @lang('settings.max_file_size')</label>
                       </div>
                       <div class="col-md-7">



                           <input type="text" class="form-control" value="{{old('max_file_size', settings('max_file_size')) }}" name="max_file_size" placeholder="@lang('settings.separate_using_exte')">



                       </div>

              
                      </div>


                      
                      <div class="row">

            
                        
                      <div class="col-md-2"> 
                          <label  class="font-bold"> @lang('settings.google_api_key')</label>
                      </div>
                      <div class="col-md-7">



                          <input type="text" class="form-control" value="{{ old('google_api_key',settings('google_api_key')) }}" name="google_api_key" >



                      </div>

             
                     </div>

                      <div class="row">

            
                        
                      <div class="col-md-2"> 
                          <label  class="font-bold"> @lang('settings.recaptcha_site_key')</label>
                      </div>
                      <div class="col-md-7">



                          <input type="text" class="form-control" value="{{ old('recaptcha_site_key',settings('recaptcha_site_key')) }}" name="recaptcha_site_key" >
                           @lang('settings.recaptcha_help')



                      </div>

             
                     </div>


                      <div class="row">

            
                        
                         <div class="col-md-2"> 
                            <label  class="font-bold"> @lang('settings.recaptcha_secret_key')</label>
                         </div>
                        <div class="col-md-7">



                            <input type="text" class="form-control" value="{{ old('recaptcha_secret_key',settings('recaptcha_secret_key')) }}" name="recaptcha_secret_key" >



                        </div>

                
                        </div>



                      <div class="row">

            
                        
                         <div class="col-md-2"> 
                            <label  class="font-bold"> @lang('settings.auto_close_ticket')</label>
                         </div>
                        <div class="col-md-5">



                            <input type="text" class="form-control" value="{{ old('auto_close_ticket',settings('auto_close_ticket')) }}" name="auto_close_ticket" >



                        </div>

                        <div class="col-md-2">
                            @lang('settings.hours') 
                           </div>

                
                        </div>



       
                        
                      <div class="row">

            
                        
                        <div class="col-md-2"> 
                           <label  class="font-bold"> @lang('settings.enable_languages')</label>
                        </div>
                       <div class="col-md-5">



                           <input type="hidden"  value="off"   name="enable_languages" >
                           <input type="checkbox" @if( old('enable_languages',settings('enable_languages')) == 'on' )  {{ 'checked' }}  @endif   name="enable_languages" >



                       </div>
                 

               
                       </div>


                                     
                      <div class="row">

            
                        
                        <div class="col-md-2"> 
                           <label  class="font-bold"> @lang('settings.allow_sub_tasks')</label>
                        </div>
                       <div class="col-md-7">



                           <input type="hidden"  value="off"   name="allow_sub_tasks" >
                           <input type="checkbox" @if( old('allow_sub_tasks',settings('allow_sub_tasks')) == 'on' )  {{ 'checked' }}   @endif   name="allow_sub_tasks" >



                       </div>

               
                       </div>


                      <div class="row">

            
                        
                        <div class="col-md-2"> 
                           <label  class="font-bold"> @lang('settings.only_allowed_ip_can_clock')</label>
                        </div>
                       <div class="col-md-7">



                           <input type="hidden"  value="off"    name="only_allowed_ip_can_clock" >
                           <input type="checkbox" @if( old('only_allowed_ip_can_clock',settings('only_allowed_ip_can_clock')) == 'on' )  {{ 'checked' }}  @endif    name="only_allowed_ip_can_clock" >



                       </div>

               
                       </div>


                       <div class="row">

            
                        
                        <div class="col-md-2"> 
                           <label  class="font-bold"> @lang('settings.allow_client_registration')</label>
                        </div>
                       <div class="col-md-7">



                           <input type="hidden"  value="off"   name="allow_client_registration" >
                           <input type="checkbox" @if( old('allow_client_registration',settings('allow_client_registration')) == 'on' )  {{ 'checked' }}  @endif    name="allow_client_registration" >



                       </div>

               
                       </div>

                       <div class="row">

            
                        
                        <div class="col-md-2"> 
                           <label  class="font-bold"> @lang('settings.allow_apply_job_from_login')</label>
                        </div>
                       <div class="col-md-7">



                           <input type="hidden"  value="off"   name="allow_apply_job_from_login" >
                           <input type="checkbox" @if( old('allow_apply_job_from_login',settings('allow_apply_job_from_login')) == 'on' )  {{ 'checked' }}  @endif   name="allow_apply_job_from_login" >



                       </div>

               
                       </div>






                    <div class="row">
                        <div class="col-md-3"> 
                            <label  class="font-bold"></label>
                        </div>
                        <div class="col-md-7">
                            
                            <button  formaction="{{ route('admin.system.store') }}" style="padding: 6px;border-radius: 0px;"  class="btn btn-sm btn-primary">@lang('settings.save_changes')</button>
                        </div>
                    </div> 




                 
                    </div>

                </form>



      
    </div>
</div>
</div>



