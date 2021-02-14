<div class="tab-pane active show estimate" id="v-pills-estimate" role="tabpanel"
aria-labelledby="v-pills-details-tab">
<div class="card  card-custom">
   <h5 class="card-header " style="text-align: left">  
      
         
               @lang('settings.estimate_settings')
              
        
      
   </h5>
   <div class="card-body">


    <form action="{{ route('admin.estimate.settings.store') }}" method="POST" >
        @csrf
                   <div class="col-md-12">


                    
                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.estimate_prefix')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <input type="text" name="estimate_prefix" value="{{ old('estimate_prefix',settings('estimate_prefix')) }}" class="form-control"  required="">
                                
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.estimate_start_no')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <input type="text" data-toggle="tooltip" data-placement="top" title="@lang('settings.days')" name="estimate_start_no" value="{{ old('estimate_start_no',settings('estimate_start_no')) }}" class="form-control  "  required="">
                                
                            </div>
                        </div>  



                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.estimate')  @lang('settings.number_format')</label>
                        <div class="col-lg-6">
                            <input type="text" name="estimate_number_format" class="form-control" 
                                   value="<?php
                                   if (empty(settings('estimate_number_format'))) {
                                       echo '[' . settings('estimate_prefix') . ']' . '[yyyy][mm][dd][number]';
                                   } else {
                                       echo settings('estimate_number_format');
                                   } ?>">
                            <small>ex [<?= settings('estimate_prefix') ?>]
                                 = <?= trans('settings.estimate_prefix') ?>,
                                 [yyyy] =
                                'Current Year (<?= date('Y') ?>)'[yy] ='Current Year (<?= date('y') ?>)',[mm] =
                                'Current Month(<?= date('M') ?>)',[m] =
                                'Current Month(<?= date('m') ?>)',[dd] = 'Current Date (<?= date('d') ?>)',[number] =
                                'estimate Number (<?= sprintf('%04d', settings('estimate_start_no')) ?>)'
                            </small>
                        </div>
                    </div>


                                 
                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.increment_estimate_number')</label>
                        <div class="col-lg-6">
                            <div class="checkbox c-checkbox">
                                <input type="hidden" name="increment_estimate_number" value="no" >

                                    <input type="checkbox" value="yes"
                                    name="increment_estimate_number"
                                     @if(old('increment_estimate_number',settings('increment_estimate_number'))
                                      == 'yes') 
                                      {{ 'checked' }} @endif
                                      >


                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.show_estimate_tax')</label>
                        <div class="col-lg-6">
                            <div class="checkbox c-checkbox">
                                <input type="hidden" name="show_estimate_tax" value="no" >

                                    <input type="checkbox" value="yes"
                                    name="show_estimate_tax"
                                     @if(old('show_estimate_tax',settings('show_estimate_tax'))
                                      == 'yes') 
                                      {{ 'checked' }} @endif
                                      >


                            </div>
                        </div>
                    </div>



        
       

                <div class="row terms">
                    <label class="col-lg-3 control-label">@lang('settings.estimate_terms')</label>
                    <div class="col-lg-9">
                    <textarea class="form-control editor-simple"
                              name="estimate_terms"><?= settings('estimate_terms') ?></textarea>
                    </div>
                </div>


                    
                <div class="row terms">
                    <label class="col-lg-3 control-label">@lang('settings.estimate_footer')</label>
                    <div class="col-lg-9">
                    <textarea class="form-control editor-simple"
                              name="estimate_footer"><?= settings('estimate_footer') ?></textarea>
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

