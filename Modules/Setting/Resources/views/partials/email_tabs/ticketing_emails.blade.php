       <!-- Section: Live preview -->

       <section class="section_tab animate  ticketing_emails_tabs">

           <ul class="nav nav-tabs" id="myTab" role="tablist">


               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link first_link active" id="ticket_client_email-tab" data-toggle="tab" href="#ticket_client_email"
                       role="tab" aria-controls="ticket_client_email"
                       aria-selected="false">@lang('settings.ticket_client_email')</a>
               </li>




               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="ticket_closed_email-tab" data-toggle="tab" href="#ticket_closed_email" role="tab"
                       aria-controls="ticket_closed_email" aria-selected="false">@lang('settings.ticket_closed_email')</a>
               </li>


               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="ticket_reply_email-tab" data-toggle="tab" href="#ticket_reply_email" role="tab"
                       aria-controls="ticket_reply_email" aria-selected="false">@lang('settings.ticket_reply_email')</a>
               </li>



               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="ticket_staff_email-tab" data-toggle="tab" href="#ticket_staff_email" role="tab"
                       aria-controls="ticket_staff_email" aria-selected="false">@lang('settings.ticket_staff_email')</a>
               </li>



               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="auto_close_ticket-tab" data-toggle="tab" href="#auto_close_ticket" role="tab"
                       aria-controls="auto_close_ticket" aria-selected="false">@lang('settings.auto_close_ticket')</a>
               </li>
               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="ticket_reopened_email-tab" data-toggle="tab" href="#ticket_reopened_email" role="tab"
                       aria-controls="ticket_reopened_email" aria-selected="false">@lang('settings.ticket_reopened_email')</a>
               </li>


          






           </ul>




           <div class="tab-content" id="myTabContent">



               <div class="tab-pane first_div fade active show" id="ticket_client_email" role="tabpanel"
                   aria-labelledby="ticket_client_email-tab">

                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf

                       <input type="hidden" name="email_group" value="ticket_client_email">
                       <input type="hidden" name="tab" value="ticketing_emails">

                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control subject_ticket_client_email" name="subject"
                                   value="{{ templates('ticket_client_email') ? templates('ticket_client_email')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea  class="form-control editor text_ticket_client_email" style="height: 600px;"
                                   name="email_template">{{ templates('ticket_client_email') ? templates('ticket_client_email')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-lg-12">

                               <button type="submit"
                                   class="btn btn-sm btn-primary ticket_client_email">@lang('settings.save_changes')</button>
                           </div>
                       </div>

                   </form>
               </div>



               <div class="tab-pane fade" id="ticket_closed_email" role="tabpanel" aria-labelledby="ticket_closed_email-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="ticket_closed_email">
                       <input type="hidden" name="tab" value="ticketing_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('ticket_closed_email') ? templates('ticket_closed_email')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea  class="form-control editor" style="height: 600px;" name="email_template">{{ templates('ticket_closed_email') ? templates('ticket_closed_email')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary ticket_closed_email">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>



               <div class="tab-pane fade" id="ticket_reply_email" role="tabpanel" aria-labelledby="ticket_reply_email-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="ticket_reply_email">
                       <input type="hidden" name="tab" value="ticketing_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('ticket_reply_email') ? templates('ticket_reply_email')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea  class="form-control editor" style="height: 600px;" name="email_template">{{ templates('ticket_reply_email') ? templates('ticket_reply_email')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary ticket_reply_email">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>




               <div class="tab-pane fade" id="ticket_staff_email" role="tabpanel" aria-labelledby="ticket_staff_email-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="ticket_staff_email">
                       <input type="hidden" name="tab" value="ticketing_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('ticket_staff_email') ? templates('ticket_staff_email')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea  class="form-control editor" style="height: 600px;" name="email_template">{{ templates('ticket_staff_email') ? templates('ticket_staff_email')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary ticket_staff_email">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>
               <div class="tab-pane fade" id="auto_close_ticket" role="tabpanel" aria-labelledby="auto_close_ticket-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="auto_close_ticket">
                       <input type="hidden" name="tab" value="ticketing_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('auto_close_ticket') ? templates('auto_close_ticket')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea  class="form-control editor" style="height: 600px;" name="email_template">{{ templates('auto_close_ticket') ? templates('auto_close_ticket')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary auto_close_ticket">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>
               <div class="tab-pane fade" id="ticket_reopened_email" role="tabpanel" aria-labelledby="ticket_reopened_email-tab">
                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="ticket_reopened_email">
                       <input type="hidden" name="tab" value="ticketing_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('ticket_reopened_email') ? templates('ticket_reopened_email')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea  class="form-control editor" style="height: 600px;" name="email_template">{{ templates('ticket_reopened_email') ? templates('ticket_reopened_email')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary ticket_reopened_email">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>
            

















           </div>

       </section>