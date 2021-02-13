       <!-- Section: Live preview -->


       <section class="section_tab animate d-none bugs_email_tabs">

           <ul class="nav nav-tabs" id="myTab" role="tablist">


               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link first_link active" id="bug_assigned-tab" data-toggle="tab" href="#bug_assigned"
                       role="tab" aria-controls="bug_assigned"
                       aria-selected="false">@lang('settings.bug_assigned')</a>
               </li>




               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="bug_comments-tab" data-toggle="tab" href="#bug_comments" role="tab"
                       aria-controls="bug_comments" aria-selected="false">@lang('settings.bug_comments')</a>
               </li>

               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="bug_attachment-tab" data-toggle="tab" href="#bug_attachment" role="tab"
                       aria-controls="bug_attachment" aria-selected="false">@lang('settings.bug_attachment')</a>
               </li>
               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="bug_updated-tab" data-toggle="tab" href="#bug_updated" role="tab"
                       aria-controls="bug_updated" aria-selected="false">@lang('settings.bug_updated')</a>
               </li>
               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="bug_reported-tab" data-toggle="tab" href="#bug_reported" role="tab"
                       aria-controls="bug_reported" aria-selected="false">@lang('settings.bug_reported')</a>
               </li>










           </ul>




           <div class="tab-content" id="myTabContent">



               <div class="tab-pane first_div fade active show" id="bug_assigned" role="tabpanel"
                   aria-labelledby="bug_assigned-tab">

                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf

                       <input type="hidden" name="email_group" value="bug_assigned">
                       <input type="hidden" name="tab" value="bugs_email">

                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control subject_bug_assigned" name="subject"
                                   value="{{ templates('bug_assigned') ? templates('bug_assigned')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor text_bug_assigned" style="height: 600px;"
                                   name="email_template">{{ templates('bug_assigned') ? templates('bug_assigned')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-lg-12">

                               <button type="submit"
                                   class="btn btn-sm btn-primary bug_assigned">@lang('settings.save_changes')</button>
                           </div>
                       </div>

                   </form>
               </div>



               <div class="tab-pane fade" id="bug_comments" role="tabpanel" aria-labelledby="bug_comments-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="bug_comments">
                       <input type="hidden" name="tab" value="bugs_email">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('bug_comments') ? templates('bug_comments')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor" style="height: 600px;" name="email_template">{{ templates('bug_comments') ? templates('bug_comments')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary bug_comments">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>



               <div class="tab-pane fade" id="bug_attachment" role="tabpanel" aria-labelledby="bug_attachment-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="bug_attachment">
                       <input type="hidden" name="tab" value="bugs_email">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('bug_attachment') ? templates('bug_attachment')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor" style="height: 600px;" name="email_template">{{ templates('bug_attachment') ? templates('bug_attachment')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary bug_attachment">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>




               <div class="tab-pane fade" id="bug_updated" role="tabpanel" aria-labelledby="bug_updated-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="bug_updated">
                       <input type="hidden" name="tab" value="bugs_email">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('bug_updated') ? templates('bug_updated')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor" style="height: 600px;" name="email_template">{{ templates('bug_updated') ? templates('bug_updated')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary bug_updated">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>
               <div class="tab-pane fade" id="bug_reported" role="tabpanel" aria-labelledby="bug_reported-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="bug_reported">
                       <input type="hidden" name="tab" value="bugs_email">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('bug_reported') ? templates('bug_reported')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea id="" class="form-control editor" style="height: 600px;" name="email_template">{{ templates('bug_reported') ? templates('bug_reported')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary bug_reported">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>


















           </div>

       </section>