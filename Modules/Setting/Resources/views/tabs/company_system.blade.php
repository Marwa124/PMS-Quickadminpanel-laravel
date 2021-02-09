<div class="tab-pane company-system" id="v-pills-company-system" role="tabpanel"
aria-labelledby="v-pills-details-tab">



<div class="card  card-custom">
   <h5 class="card-header " style="text-align: left">  
      
         
               @lang('settings.company_details')
                    
      
   </h5>
   <div class="card-body">


    <form action="{{ route('admin.system.store') }}" method="POST">
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
                                            <option  {{ old('default_language',settings('default_language')) == $language->name ? ' selected' : ''}} value="{{ $language->name }}"> {{ $language->name }}</option>
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
                                <option  {{ old('timezone',settings('timezone')) == $timezone ? ' selected' : ''}} value="{{ $timezone  }}"> {{ $description }}</option>
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
                                    <option  {{ old('currency',settings('currency')) == $currency->code  ? ' selected' : ''}} value="{{ $currency->code   }}"> {{ $currency->name  }}</option>
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
                                
                                <option  {{ old('currency_position',settings('currency_position')) == 'right'  ? ' selected' : ''}} value="'right"> @lang('settings.right') </option>
                                <option  {{ old('currency_position',settings('currency_position')) == 'left'  ? ' selected' : ''}} value="'left">  @lang('settings.left')  </option>
                              
                                
                              
                        </select>                                
                    </div>
                    
                    
                    </div> 



          


            
            

                        
                        


                    <div class="row">
                        <div class="col-md-3"> 
                            <label  class="font-bold"></label>
                        </div>
                        <div class="col-md-7">
                            
                            <button style="padding: 6px;border-radius: 0px;" type="submit" class="btn btn-sm btn-primary">@lang('settings.save_changes')</button>
                        </div>
                    </div> 




                 
                    </div>

                </form>



      
    </div>
</div>
</div>

