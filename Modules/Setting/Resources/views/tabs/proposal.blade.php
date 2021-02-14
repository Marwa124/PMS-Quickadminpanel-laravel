<div class="tab-pane active show proposal" id="v-pills-proposal" role="tabpanel"
aria-labelledby="v-pills-details-tab">
<div class="card  card-custom">
   <h5 class="card-header " style="text-align: left">  
      
         
               @lang('settings.proposal_settings')
              
        
      
   </h5>
   <div class="card-body">


    <form action="{{ route('admin.proposal.settings.store') }}" method="POST" >
        @csrf
                   <div class="col-md-12">


                    
                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.proposal_prefix')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <input type="text" name="proposal_prefix" value="{{ old('proposal_prefix',settings('proposal_prefix')) }}" class="form-control"  required="">
                                
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.proposal_start_no')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <input type="text" data-toggle="tooltip" data-placement="top" title="@lang('settings.days')" name="proposal_start_no" value="{{ old('proposal_start_no',settings('proposal_start_no')) }}" class="form-control  "  required="">
                                
                            </div>
                        </div>  



                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.proposal')  @lang('settings.number_format')</label>
                        <div class="col-lg-6">
                            <input type="text" name="proposal_number_format" class="form-control" 
                                   value="<?php
                                   if (empty(settings('proposal_number_format'))) {
                                       echo '[' . settings('proposal_prefix') . ']' . '[yyyy][mm][dd][number]';
                                   } else {
                                       echo settings('proposal_number_format');
                                   } ?>">
                            <small>ex [<?= settings('proposal_prefix') ?>]
                                 = <?= trans('settings.proposal_prefix') ?>,
                                 [yyyy] =
                                'Current Year (<?= date('Y') ?>)'[yy] ='Current Year (<?= date('y') ?>)',[mm] =
                                'Current Month(<?= date('M') ?>)',[m] =
                                'Current Month(<?= date('m') ?>)',[dd] = 'Current Date (<?= date('d') ?>)',[number] =
                                'proposal Number (<?= sprintf('%04d', settings('proposal_start_no')) ?>)'
                            </small>
                        </div>
                    </div>


                                 
                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.increment_proposal_number')</label>
                        <div class="col-lg-6">
                            <div class="checkbox c-checkbox">
                                <input type="hidden" name="increment_proposal_number" value="no" >

                                    <input type="checkbox" value="yes"
                                    name="increment_proposal_number"
                                     @if(old('increment_proposal_number',settings('increment_proposal_number'))
                                      == 'yes') 
                                      {{ 'checked' }} @endif
                                      >


                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.show_proposal_tax')</label>
                        <div class="col-lg-6">
                            <div class="checkbox c-checkbox">
                                <input type="hidden" name="show_proposal_tax" value="no" >

                                    <input type="checkbox" value="yes"
                                    name="show_proposal_tax"
                                     @if(old('show_proposal_tax',settings('show_proposal_tax'))
                                      == 'yes') 
                                      {{ 'checked' }} @endif
                                      >


                            </div>
                        </div>
                    </div>



        
       

                <div class="row terms">
                    <label class="col-lg-3 control-label">@lang('settings.proposal_terms')</label>
                    <div class="col-lg-9">
                    <textarea class="form-control editor-simple"
                              name="proposal_terms"><?= settings('proposal_terms') ?></textarea>
                    </div>
                </div>


                    
                <div class="row terms">
                    <label class="col-lg-3 control-label">@lang('settings.proposal_footer')</label>
                    <div class="col-lg-9">
                    <textarea class="form-control editor-simple"
                              name="proposal_footer"><?= settings('proposal_footer') ?></textarea>
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

