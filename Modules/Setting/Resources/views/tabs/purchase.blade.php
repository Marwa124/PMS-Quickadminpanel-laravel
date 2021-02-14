<div class="tab-pane active show purchase" id="v-pills-purchase" role="tabpanel"
aria-labelledby="v-pills-details-tab">
<div class="card  card-custom">
   <h5 class="card-header " style="text-align: left">  
      
         
               @lang('settings.purchase_settings')
              
        
      
   </h5>
   <div class="card-body">


    <form action="{{ route('admin.purchase.settings.store') }}" method="POST" >
        @csrf
                   <div class="col-md-12">


                    
                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.purchase_prefix')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <input type="text" name="purchase_prefix" value="{{ old('purchase_prefix',settings('purchase_prefix')) }}" class="form-control"  required="">
                                
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.purchase_start_no')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <input type="text" data-toggle="tooltip" data-placement="top" title="@lang('settings.days')" name="purchase_start_no" value="{{ old('purchase_start_no',settings('purchase_start_no')) }}" class="form-control  "  required="">
                                
                            </div>
                        </div>  



                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.purchase')  @lang('settings.number_format')</label>
                        <div class="col-lg-6">
                            <input type="text" name="purchase_number_format" class="form-control" 
                                   value="<?php
                                   if (empty(settings('purchase_number_format'))) {
                                       echo '[' . settings('purchase_prefix') . ']' . '[yyyy][mm][dd][number]';
                                   } else {
                                       echo settings('purchase_number_format');
                                   } ?>">
                            <small>ex [<?= settings('purchase_prefix') ?>]
                                 = <?= trans('settings.purchase_prefix') ?>,
                                 [yyyy] =
                                'Current Year (<?= date('Y') ?>)'[yy] ='Current Year (<?= date('y') ?>)',[mm] =
                                'Current Month(<?= date('M') ?>)',[m] =
                                'Current Month(<?= date('m') ?>)',[dd] = 'Current Date (<?= date('d') ?>)',[number] =
                                'purchase Number (<?= sprintf('%04d', settings('purchase_start_no')) ?>)'
                            </small>
                        </div>
                    </div>


                                 
                 










                    
                    
                    <div class="row">
                        <div class="col-md-3"> 
                            <label  class="font-bold"> @lang('settings.return_stock_prefix')</label>
                        </div>
                        <div class="col-md-7">
                            
                            <input type="text" name="return_stock_prefix" value="{{ old('return_stock_prefix',settings('return_stock_prefix')) }}" class="form-control"  required="">
                            
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3"> 
                            <label  class="font-bold"> @lang('settings.return_stock_start_no')</label>
                        </div>
                        <div class="col-md-7">
                            
                            <input type="text" data-toggle="tooltip" data-placement="top" title="@lang('settings.days')" name="return_stock_start_no" value="{{ old('return_stock_start_no',settings('return_stock_start_no')) }}" class="form-control  "  required="">
                            
                        </div>
                    </div>  



                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.return_stock')  @lang('settings.number_format')</label>
                    <div class="col-lg-6">
                        <input type="text" name="return_stock_number_format" class="form-control" 
                               value="<?php
                               if (empty(settings('return_stock_number_format'))) {
                                   echo '[' . settings('return_stock_prefix') . ']' . '[yyyy][mm][dd][number]';
                               } else {
                                   echo settings('return_stock_number_format');
                               } ?>">
                        <small>ex [<?= settings('return_stock_prefix') ?>]
                             = <?= trans('settings.return_stock_prefix') ?>,
                             [yyyy] =
                            'Current Year (<?= date('Y') ?>)'[yy] ='Current Year (<?= date('y') ?>)',[mm] =
                            'Current Month(<?= date('M') ?>)',[m] =
                            'Current Month(<?= date('m') ?>)',[dd] = 'Current Date (<?= date('d') ?>)',[number] =
                            'Invoice Number (<?= sprintf('%04d', settings('return_stock_start_no')) ?>)'
                        </small>
                    </div>
                </div>

                 



        
       


                    
                <div class="row terms">
                    <label class="col-lg-3 control-label">@lang('settings.purchase_notes')</label>
                    <div class="col-lg-9">
                    <textarea class="form-control editor-simple"
                              name="purchase_notes"><?= settings('purchase_notes') ?></textarea>
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

