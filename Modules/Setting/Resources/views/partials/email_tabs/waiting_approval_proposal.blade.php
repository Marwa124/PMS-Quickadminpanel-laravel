       <!-- Section: Live preview -->


       <section class="section_tab animate d-none waiting_approval_proposal_tabs">

           <ul class="nav nav-tabs" id="myTab" role="tablist">


               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link first_link active" id="waiting_approval_proposal-tab" data-toggle="tab" href="#waiting_approval_proposal"
                       role="tab" aria-controls="waiting_approval_proposal"
                       aria-selected="false">@lang('settings.waiting_approval_proposal')</a>
               </li>









           </ul>




           <div class="tab-content" id="myTabContent">



               <div class="tab-pane first_div fade active show" id="waiting_approval_proposal" role="tabpanel"
                   aria-labelledby="waiting_approval_proposal-tab">

                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf

                       <input type="hidden" name="email_group" value="waiting_approval_proposal">
                       <input type="hidden" name="tab" value="waiting_approval_proposal">

                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control subject_waiting_approval_proposal" name="subject"
                                   value="{{ templates('waiting_approval_proposal') ? templates('waiting_approval_proposal')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor text_waiting_approval_proposal" style="height: 600px;"
                                   name="email_template">{{ templates('waiting_approval_proposal') ? templates('waiting_approval_proposal')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-lg-12">

                               <button type="submit"
                                   class="btn btn-sm btn-primary waiting_approval_proposal">@lang('settings.save_changes')</button>
                           </div>
                       </div>

                   </form>
               </div>



              






           </div>

       </section>