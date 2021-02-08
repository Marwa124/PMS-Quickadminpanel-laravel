<div class="tab-pane fade show active" id="v-pills-company-details" role="tabpanel"
aria-labelledby="v-pills-details-tab">
<div class="card  card-custom">
   <h5 class="card-header " style="text-align: left">  
      
         
               @lang('settings.company_details')
              
        
      
   </h5>
   <div class="card-body">


    <form action="{{ route('admin.details.store') }}" method="POST">
        @csrf
                   <div class="col-md-12">

                    
                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.company_name')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <input type="text" name="company_name" value="{{ old('company_name',settings('company_name')) }}" class="form-control"  required="">
                                
                            </div>
                        </div>  


                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.legal_name')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <input type="text" name="company_legal_name" value="{{ old('company_legal_name',settings('company_legal_name')) }}" class="form-control"  required="">
                                
                            </div>
                        </div>  


                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.contact_person')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <input type="text" name="contact_person" class="form-control" value="{{ old('contact_person',settings('contact_person')) }}" required="">
                                
                            </div>
                        </div>  


                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.company_address')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <textarea type="text" name="company_address" rows="2" class="form-control" required="">{{ old('company_address',settings('company_address')) }}
                                </textarea>    
                                
                            </div>
                        </div> 
                        
                        
                        
                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.company_country')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <select class="form-control select_box" style="width:100%" name="company_country">
                                    {{-- <optgroup label="@lang('settings.selected_country')">
                               
                                </optgroup> --}}
                                {{-- <optgroup label="@lang('settings.other_countries')"> --}}

                                    <option
                                    value="" >
                                    @lang('settings.select_country')
                                 </option>
                                    @forelse ($countries as $country)
                                    <option  {{ old('company_country',settings('company_country')) == $country->value ? ' selected' : ''}} value="{{ $country->value }}"> {{ $country->value }}</option>
                                    @empty
                                    
                                    @endforelse
                                {{-- </optgroup> --}}
                            </select>                                
                        </div>
                        
                        
                    </div> 


                    <div class="row">
                        <div class="col-md-3"> 
                            <label  class="font-bold"> @lang('settings.company_city')</label>
                        </div>
                        <div class="col-md-7">
                            
                            <input type="text" class="form-control" value="{{ old('company_city',settings('company_city','Test Alt'))  }}" name="company_city">                            
                        </div>
                    </div> 


                    <div class="row">
                        <div class="col-md-3"> 
                            <label  class="font-bold"> @lang('settings.zip_code')</label>
                        </div>
                        <div class="col-md-7">
                            
                            <input type="text" class="form-control" value="{{ old('company_zip_code',settings('company_zip_code'))  }}" name="company_zip_code">
                        </div>
                    </div> 


                    <div class="row">
                        <div class="col-md-3"> 
                            <label  class="font-bold"> @lang('settings.company_phone')</label>
                        </div>
                        <div class="col-md-7">
                            
                            <input type="text" class="form-control" value="{{ old('company_phone',settings('company_phone'))  }}" name="company_phone">
                        </div>
                    </div> 


                    <div class="row">
                        <div class="col-md-3"> 
                            <label  class="font-bold"> @lang('settings.company_email')</label>
                        </div>
                        <div class="col-md-7">
                            
                            <input type="email" class="form-control" value="{{ old('company_email',settings('company_email'))  }}" name="company_email">
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-3"> 
                            <label  class="font-bold"> @lang('settings.company_website')</label>
                        </div>
                        <div class="col-md-7">
                            
                            <input type="text" class="form-control" value="{{ old('company_domain',settings('company_domain'))  }}" name="company_domain">
                        </div>
                    </div> 


                    <div class="row">
                        <div class="col-md-3"> 
                            <label  class="font-bold"> @lang('settings.company_vat')</label>
                        </div>
                        <div class="col-md-7">
                            
                            <input type="text" class="form-control" value="{{ old('company_vat',settings('company_vat'))  }}" name="company_vat">
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

