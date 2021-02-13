       <!-- Section: Live preview -->

       {{-- $email['extra'] = array("","", "", "", "", "", "", ""); --}}


       <section class="section_tab animate d-none extra_emails_tabs">

           <ul class="nav nav-tabs" id="myTab" role="tablist">


               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link first_link active" id="estimate_email-tab" data-toggle="tab" href="#estimate_email"
                       role="tab" aria-controls="estimate_email"
                       aria-selected="false">@lang('settings.estimate_email')</a>
               </li>




               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="estimate_overdue_email-tab" data-toggle="tab" href="#estimate_overdue_email" role="tab"
                       aria-controls="estimate_overdue_email" aria-selected="false">@lang('settings.estimate_overdue_email')</a>
               </li>


               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="proposal_email-tab" data-toggle="tab" href="#proposal_email" role="tab"
                       aria-controls="proposal_email" aria-selected="false">@lang('settings.proposal_email')</a>
               </li>


               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="proposal_overdue_email-tab" data-toggle="tab" href="#proposal_overdue_email" role="tab"
                       aria-controls="proposal_overdue_email" aria-selected="false">@lang('settings.proposal_overdue_email')</a>
               </li>



               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="message_received-tab" data-toggle="tab" href="#message_received" role="tab"
                       aria-controls="message_received" aria-selected="false">@lang('settings.message_received')</a>
               </li>


               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="quotations_form-tab" data-toggle="tab" href="#quotations_form" role="tab"
                       aria-controls="quotations_form" aria-selected="false">@lang('settings.quotations_form')</a>
               </li>




               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="goal_achieve-tab" data-toggle="tab" href="#goal_achieve" role="tab"
                       aria-controls="goal_achieve" aria-selected="false">@lang('settings.goal_achieve')</a>
               </li>


               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="goal_not_achieve-tab" data-toggle="tab" href="#goal_not_achieve" role="tab"
                       aria-controls="goal_not_achieve" aria-selected="false">@lang('settings.goal_not_achieve')</a>
               </li>



             





           </ul>




           <div class="tab-content" id="myTabContent">



               <div class="tab-pane first_div fade active show" id="estimate_email" role="tabpanel"
                   aria-labelledby="estimate_email-tab">

                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf

                       <input type="hidden" name="email_group" value="estimate_email">
                       <input type="hidden" name="tab" value="extra_emails">

                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control subject_estimate_email" name="subject"
                                   value="{{ templates('estimate_email') ? templates('estimate_email')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor text_estimate_email" style="height: 600px;"
                                   name="email_template">{{ templates('estimate_email') ? templates('estimate_email')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-lg-12">

                               <button type="submit"
                                   class="btn btn-sm btn-primary estimate_email">@lang('settings.save_changes')</button>
                           </div>
                       </div>

                   </form>
               </div>



               <div class="tab-pane fade" id="estimate_overdue_email" role="tabpanel" aria-labelledby="estimate_overdue_email-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="estimate_overdue_email">
                       <input type="hidden" name="tab" value="extra_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('estimate_overdue_email') ? templates('estimate_overdue_email')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor" style="height: 600px;" name="email_template">{{ templates('estimate_overdue_email') ? templates('estimate_overdue_email')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary estimate_overdue_email">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>



               <div class="tab-pane fade" id="proposal_email" role="tabpanel" aria-labelledby="proposal_email-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="proposal_email">
                       <input type="hidden" name="tab" value="extra_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('proposal_email') ? templates('proposal_email')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor" style="height: 600px;" name="email_template">{{ templates('proposal_email') ? templates('proposal_email')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary proposal_email">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>




               <div class="tab-pane fade" id="proposal_overdue_email" role="tabpanel" aria-labelledby="proposal_overdue_email-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="proposal_overdue_email">
                       <input type="hidden" name="tab" value="extra_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('proposal_overdue_email') ? templates('proposal_overdue_email')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor" style="height: 600px;" name="email_template">{{ templates('proposal_overdue_email') ? templates('proposal_overdue_email')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary proposal_overdue_email">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>


               <div class="tab-pane fade" id="message_received" role="tabpanel" aria-labelledby="message_received-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="message_received">
                       <input type="hidden" name="tab" value="extra_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('message_received') ? templates('message_received')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor" style="height: 600px;" name="email_template">{{ templates('message_received') ? templates('message_received')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary message_received">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>

               <div class="tab-pane fade" id="quotations_form" role="tabpanel" aria-labelledby="quotations_form-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="quotations_form">
                       <input type="hidden" name="tab" value="extra_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('quotations_form') ? templates('quotations_form')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor" style="height: 600px;" name="email_template">{{ templates('quotations_form') ? templates('quotations_form')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary quotations_form">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>
               <div class="tab-pane fade" id="goal_achieve" role="tabpanel" aria-labelledby="goal_achieve-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="goal_achieve">
                       <input type="hidden" name="tab" value="extra_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('goal_achieve') ? templates('goal_achieve')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor" style="height: 600px;" name="email_template">{{ templates('goal_achieve') ? templates('goal_achieve')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary goal_achieve">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>
          
               <div class="tab-pane fade" id="goal_not_achieve" role="tabpanel" aria-labelledby="goal_not_achieve-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="goal_not_achieve">
                       <input type="hidden" name="tab" value="extra_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('goal_not_achieve') ? templates('goal_not_achieve')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor" style="height: 600px;" name="email_template">{{ templates('goal_not_achieve') ? templates('goal_not_achieve')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary goal_not_achieve">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>
          



           </div>

       </section>