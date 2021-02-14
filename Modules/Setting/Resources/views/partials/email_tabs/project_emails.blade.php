       <!-- Section: Live preview -->

       <section class="section_tab animate project_emails_tabs">

           <ul class="nav nav-tabs" id="myTab" role="tablist">


               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link first_link active" id="client_notification-tab" data-toggle="tab" href="#client_notification"
                       role="tab" aria-controls="client_notification"
                       aria-selected="false">@lang('settings.client_notification')</a>
               </li>




               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="assigned_project-tab" data-toggle="tab" href="#assigned_project" role="tab"
                       aria-controls="assigned_project" aria-selected="false">@lang('settings.assigned_project')</a>
               </li>

               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="complete_projects-tab" data-toggle="tab" href="#complete_projects" role="tab"
                       aria-controls="complete_projects" aria-selected="false">@lang('settings.complete_projects')</a>
               </li>
               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="project_comments-tab" data-toggle="tab" href="#project_comments" role="tab"
                       aria-controls="project_comments" aria-selected="false">@lang('settings.project_comments')</a>
               </li>
               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="project_attachment-tab" data-toggle="tab" href="#project_attachment" role="tab"
                       aria-controls="project_attachment" aria-selected="false">@lang('settings.project_attachment')</a>
               </li>
               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="responsible_milestone-tab" data-toggle="tab" href="#responsible_milestone" role="tab"
                       aria-controls="responsible_milestone" aria-selected="false">@lang('settings.responsible_milestone')</a>
               </li>


               <li class="nav-item waves-effect waves-light">
                   <a class="nav-link " id="project_overdue_email-tab" data-toggle="tab" href="#project_overdue_email" role="tab"
                       aria-controls="project_overdue_email" aria-selected="false">@lang('settings.project_overdue_email')</a>
               </li>










           </ul>




           <div class="tab-content" id="myTabContent">



               <div class="tab-pane first_div fade active show" id="client_notification" role="tabpanel"
                   aria-labelledby="client_notification-tab">

                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf

                       <input type="hidden" name="email_group" value="client_notification">
                       <input type="hidden" name="tab" value="project_emails">

                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control subject_client_notification" name="subject"
                                   value="{{ templates('client_notification') ? templates('client_notification')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea  class="form-control editor text_client_notification" style="height: 600px;"
                                   name="email_template">{{ templates('client_notification') ? templates('client_notification')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>
                       <div class="form-group">
                           <div class="col-lg-12">

                               <button type="submit"
                                   class="btn btn-sm btn-primary client_notification">@lang('settings.save_changes')</button>
                           </div>
                       </div>

                   </form>
               </div>



               <div class="tab-pane fade" id="assigned_project" role="tabpanel" aria-labelledby="assigned_project-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="assigned_project">
                       <input type="hidden" name="tab" value="project_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('assigned_project') ? templates('assigned_project')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea  class="form-control editor" style="height: 600px;" name="email_template">{{ templates('assigned_project') ? templates('assigned_project')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary assigned_project">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>



               <div class="tab-pane fade" id="complete_projects" role="tabpanel" aria-labelledby="complete_projects-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="complete_projects">
                       <input type="hidden" name="tab" value="project_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('complete_projects') ? templates('complete_projects')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea  class="form-control editor" style="height: 600px;" name="email_template">{{ templates('complete_projects') ? templates('complete_projects')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary complete_projects">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>




               <div class="tab-pane fade" id="project_comments" role="tabpanel" aria-labelledby="project_comments-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="project_comments">
                       <input type="hidden" name="tab" value="project_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('project_comments') ? templates('project_comments')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea  class="form-control editor" style="height: 600px;" name="email_template">{{ templates('project_comments') ? templates('project_comments')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary project_comments">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>
               <div class="tab-pane fade" id="project_attachment" role="tabpanel" aria-labelledby="project_attachment-tab">


                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="project_attachment">
                       <input type="hidden" name="tab" value="project_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('project_attachment') ? templates('project_attachment')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea  class="form-control editor" style="height: 600px;" name="email_template">{{ templates('project_attachment') ? templates('project_attachment')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary project_attachment">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>
               <div class="tab-pane fade" id="responsible_milestone" role="tabpanel" aria-labelledby="responsible_milestone-tab">
                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="responsible_milestone">
                       <input type="hidden" name="tab" value="project_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('responsible_milestone') ? templates('responsible_milestone')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea  class="form-control editor" style="height: 600px;" name="email_template">{{ templates('responsible_milestone') ? templates('responsible_milestone')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary responsible_milestone">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>
               <div class="tab-pane fade" id="project_overdue_email" role="tabpanel" aria-labelledby="project_overdue_email-tab">
                   <form action="{{ route('admin.update.templates') }}" method="post">
                       @csrf
                       <input type="hidden" name="email_group" value="project_overdue_email">
                       <input type="hidden" name="tab" value="project_emails">


                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.subject') </label>
                           <div class="col-lg-12">
                               <input class="form-control" name="subject"
                                   value="{{ templates('project_overdue_email') ? templates('project_overdue_email')->subject : '' }}" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-lg-12">@lang('settings.message')</label>
                           <div class="col-lg-12">
                               <textarea  class="form-control editor" style="height: 600px;" name="email_template">{{ templates('project_overdue_email') ? templates('project_overdue_email')->template_body : '' }}
                               </textarea>

                           </div>
                       </div>


                       <div class="form-group col-lg-12">

                           <button type="submit"
                               class="btn btn-sm btn-primary project_overdue_email">@lang('settings.save_changes')</button>
                       </div>


                   </form>
               </div>


















           </div>

       </section>