       <!-- Section: Live preview -->
       <section class="section_tab  invoicing_emails_tabs">
      
        <ul class="nav nav-tabs" id="myTab" role="tablist">

             
          <li class="nav-item waves-effect waves-light">
            <a class="first_link nav-link active" id="invoice_message-tab" data-toggle="tab" href="#invoice_message" role="tab" aria-controls="invoice_message"
             aria-selected="false">@lang('settings.invoice_message')</a>
          </li>

          <li class="nav-item waves-effect waves-light">
            <a class="nav-link " id="invoice_reminder-tab" data-toggle="tab" 
            href="#invoice_reminder" role="tab" aria-controls="invoice_reminder" aria-selected="false">@lang('settings.invoice_reminder')</a>
          </li>

          <li class="nav-item waves-effect waves-light">
            <a class="nav-link " id="payment_email-tab" data-toggle="tab" 
            href="#payment_email" role="tab" aria-controls="payment_email" aria-selected="false">@lang('settings.payment_email')</a>
          </li>
          <li class="nav-item waves-effect waves-light">
            <a class="nav-link " id="invoice_overdue_email-tab" data-toggle="tab" 
            href="#invoice_overdue_email" role="tab" aria-controls="invoice_overdue_email" aria-selected="false">@lang('settings.invoice_overdue_email')</a>
          </li>

          <li class="nav-item waves-effect waves-light">
            <a class="nav-link " id="refund_confirmation-tab" data-toggle="tab" 
            href="#refund_confirmation" role="tab" aria-controls="refund_confirmation" aria-selected="false">@lang('settings.refund_confirmation')</a>
          </li>




 



        </ul>




        <div class="tab-content" id="myTabContent">



          <div class="first_div tab-pane fade active show" id="invoice_message" role="tabpanel" aria-labelledby="activate-tab">

            <form action="{{ route('admin.update.templates') }}" method="post">
                @csrf
        
                <input type="hidden" name="email_group" value="invoice_message">
                <input type="hidden" name="tab" value="invoicing_emails">


                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.subject') </label>
                    <div class="col-lg-12">
                        <input class="form-control subject_invoice_message" name="subject" value="{{ templates('invoice_message') ? templates('invoice_message')->subject : '' }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.message')</label>
                    <div class="col-lg-12">
                <textarea  class="form-control editor text_invoice_message"  style="height: 600px;" name="email_template">{{ templates('invoice_message') ? templates('invoice_message')->template_body : '' }}
                </textarea>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                
                        <button   type="submit" class="btn btn-sm btn-primary invoice_message">@lang('settings.save_changes')</button>
                    </div> 
                </div>
            
            </form>
        </div>



          <div class="tab-pane fade" id="invoice_reminder" role="tabpanel" aria-labelledby="invoice_reminder-tab">


                <form  action="{{ route('admin.update.templates') }}" method="post">
                    @csrf
                        <input type="hidden" name="email_group" value="invoice_reminder">
                        <input type="hidden" name="tab" value="invoicing_emails">


                        <div class="form-group">
                            <label class="col-lg-12">@lang('settings.subject') </label>
                            <div class="col-lg-12">
                                <input class="form-control" name="subject" value="{{ templates('invoice_reminder') ? templates('invoice_reminder')->subject : '' }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-12">@lang('settings.message')</label>
                            <div class="col-lg-12">
                        <textarea  class="form-control editor"  style="height: 600px;" name="email_template">{{ templates('invoice_reminder') ? templates('invoice_reminder')->template_body : '' }}
                        </textarea>

                            </div>
                        </div>


                        <div class="form-group col-lg-12">

                            <button type="submit" class="btn btn-sm btn-primary invoice_reminder">@lang('settings.save_changes')</button>
                        </div>
                
                
                </form>
         </div>


         <div class="tab-pane fade" id="payment_email" role="tabpanel" aria-labelledby="payment_email-tab">


            <form  action="{{ route('admin.update.templates') }}" method="post">
                @csrf
                    <input type="hidden" name="email_group" value="payment_email">
                    <input type="hidden" name="tab" value="invoicing_emails">


                    <div class="form-group">
                        <label class="col-lg-12">@lang('settings.subject') </label>
                        <div class="col-lg-12">
                            <input class="form-control" name="subject" value="{{ templates('payment_email') ? templates('payment_email')->subject : '' }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-12">@lang('settings.message')</label>
                        <div class="col-lg-12">
                    <textarea  class="form-control editor"  style="height: 600px;" name="email_template">{{ templates('payment_email') ? templates('payment_email')->template_body : '' }}
                    </textarea>

                        </div>
                    </div>


                    <div class="form-group col-lg-12">

                        <button type="submit" class="btn btn-sm btn-primary payment_email">@lang('settings.save_changes')</button>
                    </div>
            
            
            </form>
     </div>
         <div class="tab-pane fade" id="invoice_overdue_email" role="tabpanel" aria-labelledby="invoice_overdue_email-tab">


            <form  action="{{ route('admin.update.templates') }}" method="post">
                @csrf
                    <input type="hidden" name="email_group" value="invoice_overdue_email">
                    <input type="hidden" name="tab" value="invoicing_emails">


                    <div class="form-group">
                        <label class="col-lg-12">@lang('settings.subject') </label>
                        <div class="col-lg-12">
                            <input class="form-control" name="subject" value="{{ templates('invoice_overdue_email') ? templates('invoice_overdue_email')->subject : '' }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-12">@lang('settings.message')</label>
                        <div class="col-lg-12">
                    <textarea  class="form-control editor"  style="height: 600px;" name="email_template">{{ templates('invoice_overdue_email') ? templates('invoice_overdue_email')->template_body : '' }}
                    </textarea>

                        </div>
                    </div>


                    <div class="form-group col-lg-12">

                        <button type="submit" class="btn btn-sm btn-primary invoice_overdue_email">@lang('settings.save_changes')</button>
                    </div>
            
            
            </form>
     </div>
         <div class="tab-pane fade" id="refund_confirmation" role="tabpanel" aria-labelledby="refund_confirmation-tab">


            <form  action="{{ route('admin.update.templates') }}" method="post">
                @csrf
                    <input type="hidden" name="email_group" value="refund_confirmation">
                    <input type="hidden" name="tab" value="invoicing_emails">


                    <div class="form-group">
                        <label class="col-lg-12">@lang('settings.subject') </label>
                        <div class="col-lg-12">
                            <input class="form-control" name="subject" value="{{ templates('refund_confirmation') ? templates('refund_confirmation')->subject : '' }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-12">@lang('settings.message')</label>
                        <div class="col-lg-12">
                    <textarea  class="form-control editor"  style="height: 600px;" name="email_template">{{ templates('refund_confirmation') ? templates('refund_confirmation')->template_body : '' }}
                    </textarea>

                        </div>
                    </div>


                    <div class="form-group col-lg-12">

                        <button type="submit" class="btn btn-sm btn-primary refund_confirmation">@lang('settings.save_changes')</button>
                    </div>
            
            
            </form>
     </div>





       












        </div>

      </section>

   