<div class="tab-pane active show invoice" id="v-pills-invoice" role="tabpanel"
aria-labelledby="v-pills-details-tab">
<div class="card  card-custom">
   <h5 class="card-header " style="text-align: left">  
      
         
               @lang('settings.invoice_settings')
              
        
      
   </h5>
   <div class="card-body">


    <form action="{{ route('admin.invoice.settings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
                   <div class="col-md-12">

                    
                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.invoice_prefix')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <input type="text" name="invoice_prefix" value="{{ old('invoice_prefix',settings('invoice_prefix')) }}" class="form-control"  required="">
                                
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.invoices_due_after')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <input type="text" data-toggle="tooltip" data-placement="top" title="@lang('settings.days')" name="invoices_due_after" value="{{ old('invoices_due_after',settings('invoices_due_after')) }}" class="form-control  "  required="">
                                
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-md-3"> 
                                <label  class="font-bold"> @lang('settings.invoice_start_no')</label>
                            </div>
                            <div class="col-md-7">
                                
                                <input type="text"  name="invoice_start_no" value="{{ old('invoice_start_no',settings('invoice_start_no')) }}" class="form-control"  required="">
                                
                            </div>
                        </div>  



                        

                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.invoice')  @lang('settings.number_format')</label>
                        <div class="col-lg-6">
                            <input type="text" name="invoice_number_format" class="form-control" 
                                   value="<?php
                                   if (empty(settings('invoice_number_format'))) {
                                       echo '[' . settings('invoice_prefix') . ']' . '[yyyy][mm][dd][number]';
                                   } else {
                                       echo settings('invoice_number_format');
                                   } ?>">
                            <small>ex [<?= settings('invoice_prefix') ?>]
                                 = <?= trans('settings.invoice_prefix') ?>,
                                 [yyyy] =
                                'Current Year (<?= date('Y') ?>)'[yy] ='Current Year (<?= date('y') ?>)',[mm] =
                                'Current Month(<?= date('M') ?>)',[m] =
                                'Current Month(<?= date('m') ?>)',[dd] = 'Current Date (<?= date('d') ?>)',[number] =
                                'Invoice Number (<?= sprintf('%04d', settings('invoice_start_no')) ?>)'
                            </small>
                        </div>
                    </div>





                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.qty_calculation_from_items')</label>
                        <div class="col-lg-6">
                            <div class="checkbox c-checkbox">
                                <input type="hidden" name="qty_calculation_from_items" value="no" >
                                    <input type="checkbox" value="yes"
                                    name="qty_calculation_from_items"
                                     @if(old('qty_calculation_from_items',settings('qty_calculation_from_items'))
                                      == 'yes') 
                                      {{ 'checked' }} @endif
                                      >

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.amount_to_words')</label>
                        <div class="col-lg-6">
                            <div class="checkbox c-checkbox">
                                <input type="hidden" name="amount_to_words" value="no" >


                                    <input type="checkbox" value="yes"
                                    name="amount_to_words"
                                     @if(old('amount_to_words',settings('amount_to_words'))
                                      == 'yes') 
                                      {{ 'checked' }} @endif
                                      >

                                      <small>@lang('settings.output_total_amount')   @lang('settings.in') @lang('settings.invoice')
                                         @lang('settings.payments')  @lang('settings.estimate') 
                                         @lang('settings.proposal')  @lang('settings.and')  @lang('settings.purchase')
                                   </small>

                            </div>
                        </div>
                    </div>




                    
                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.allow_customer_edit_amount')</label>
                        <div class="col-lg-6">
                            <div class="checkbox c-checkbox">
                                <input type="hidden" name="allow_customer_edit_amount" value="no" >

                                    <input type="checkbox" value="yes"
                                    name="allow_customer_edit_amount"
                                     @if(old('allow_customer_edit_amount',settings('allow_customer_edit_amount'))
                                      == 'yes') 
                                      {{ 'checked' }} @endif
                                      >


                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.increment_invoice_number')</label>
                        <div class="col-lg-6">
                            <div class="checkbox c-checkbox">
                                <input type="hidden" name="increment_invoice_number" value="no" >

                                    <input type="checkbox" value="yes"
                                    name="increment_invoice_number"
                                     @if(old('increment_invoice_number',settings('increment_invoice_number'))
                                      == 'yes') 
                                      {{ 'checked' }} @endif
                                      >


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.show_item_tax')</label>
                        <div class="col-lg-6">
                            <div class="checkbox c-checkbox">
                                <input type="hidden" name="show_item_tax" value="no" >

                                    <input type="checkbox" value="yes"
                                    name="show_item_tax"
                                     @if(old('show_item_tax',settings('show_item_tax'))
                                      == 'yes') 
                                      {{ 'checked' }} @endif
                                      >


                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <label class="col-lg-3 control-label">@lang('settings.send_email_when_recur')</label>
                        <div class="col-lg-6">
                            <div class="checkbox c-checkbox">
                                <input type="hidden" name="send_email_when_recur" value="no" >

                                    <input type="checkbox" value="yes"
                                    name="send_email_when_recur"
                                     @if(old('send_email_when_recur',settings('send_email_when_recur'))
                                      == 'yes') 
                                      {{ 'checked' }} @endif
                                      >
    
    
                            </div>
                        </div>
                    </div>

                                 
                        
                    <div class="row">
                        <div class="col-md-3"> 
                            <label  class="font-bold"> @lang('settings.invoice_view')</label>
                        </div>
                        <div class="col-md-7">
                            
                            <select class="form-control select_box" style="width:100%" name="invoice_view">
                       
                                <option
                                value="" >
                                @lang('settings.select_view')
                             </option>
                              
          <option  {{ old('invoice_view',settings('invoice_view')) == 1 ? ' selected' : ''}} value="1">  @lang('settings.tax_invoice')</option>
          <option  {{ old('invoice_view',settings('invoice_view')) == 0 ? ' selected' : ''}} value="1">  @lang('settings.standard')</option>
          {{-- <option  {{ old('invoice_view',settings('invoice_view')) == 2 ? ' selected' : ''}} value="1">  @lang('settings.indian_gst')</option> --}}
                   
                        </select>                                
                    </div>
                    
                    
                </div> 



     




                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.invoice_logo')</label>
                    <div class="col-lg-7">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 250px;">
                                <?php if (settings('invoice_logo') != '') : ?>
                                    <img src="{{ asset('settings/invoice/'.settings('invoice_logo')) }}">
                                <?php else: ?>
                                    <img src="http://placehold.it/350x260" alt="Please Connect Your Internet">
                                <?php endif; ?>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="width: 210px;"></div>
                            <div>
                                <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">
                                        <input type="file" name="invoice_logo" value="upload"
                                               data-buttonText="@lang('settings.choose_file')" id="myImg"/>
                                    </span>
                                </span>
                                    

                            </div>

                            <div id="valid_msg" style="color: #e11221"></div>

                        </div>
                    </div>
                </div>


                <div class="row terms">
                    <label class="col-lg-3 control-label">@lang('settings.default_terms')</label>
                    <div class="col-lg-9">
                    <textarea class="form-control editor-simple"
                              name="default_terms"><?= settings('default_terms') ?></textarea>
                    </div>
                </div>


                    
                <div class="row terms">
                    <label class="col-lg-3 control-label">@lang('settings.invoice_footer')</label>
                    <div class="col-lg-9">
                    <textarea class="form-control editor-simple"
                              name="invoice_footer"><?= settings('invoice_footer') ?></textarea>
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

