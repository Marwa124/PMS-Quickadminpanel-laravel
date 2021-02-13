       <!-- Section: Live preview -->

       <section class="section_tab animate d-none task_email_tabs">
      
        <ul class="nav nav-tabs" id="myTab" role="tablist">


          <li class="nav-item waves-effect waves-light">
            <a class="nav-link first_link active" id="task_assigned-tab" data-toggle="tab" href="#task_assigned" role="tab" aria-controls="task_assigned"
             aria-selected="false">@lang('settings.task_assigned')</a>
          </li>

          <li class="nav-item waves-effect waves-light">
            <a class="nav-link " id="tasks_comments-tab" data-toggle="tab" 
            href="#tasks_comments" role="tab" aria-controls="tasks_comments" aria-selected="false">@lang('settings.tasks_comments')</a>
          </li>
          
          <li class="nav-item waves-effect waves-light">
            <a class="nav-link " id="tasks_attachment-tab" data-toggle="tab" 
            href="#tasks_attachment" role="tab" aria-controls="tasks_attachment" aria-selected="false">@lang('settings.tasks_attachment')</a>
          </li>
          <li class="nav-item waves-effect waves-light">
            <a class="nav-link " id="tasks_updated-tab" data-toggle="tab" 
            href="#tasks_updated" role="tab" aria-controls="tasks_updated" aria-selected="false">@lang('settings.tasks_updated')</a>
          </li>

     




 



        </ul>




        <div class="tab-content" id="myTabContent">



          <div class="tab-pane first_div fade active show" id="task_assigned" role="tabpanel" aria-labelledby="task_assigned-tab">

            <form action="{{ route('admin.update.templates') }}" method="post">
                @csrf
        
                <input type="hidden" name="email_group" value="task_assigned">
                <input type="hidden" name="tab" value="task_email">

                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.subject') </label>
                    <div class="col-lg-12">
                        <input class="form-control subject_task_assigned" name="subject" value="{{ templates('task_assigned') ? templates('task_assigned')->subject : '' }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.message')</label>
                    <div class="col-lg-12">
                <textarea id="" class="form-control editor text_task_assigned"  style="height: 600px;" name="email_template">{{ templates('task_assigned') ? templates('task_assigned')->template_body : '' }}
                </textarea>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                
                        <button   type="submit" class="btn btn-sm btn-primary task_assigned">@lang('settings.save_changes')</button>
                    </div> 
                </div>
            
            </form>
        </div>



          <div class="tab-pane fade" id="tasks_comments" role="tabpanel" aria-labelledby="tasks_comments-tab">


                <form  action="{{ route('admin.update.templates') }}" method="post">
                    @csrf
                        <input type="hidden" name="email_group" value="tasks_comments">
                        <input type="hidden" name="tab" value="task_email">


                        <div class="form-group">
                            <label class="col-lg-12">@lang('settings.subject') </label>
                            <div class="col-lg-12">
                                <input class="form-control" name="subject" value="{{ templates('tasks_comments') ? templates('tasks_comments')->subject : '' }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-12">@lang('settings.message')</label>
                            <div class="col-lg-12">
                        <textarea id="" class="form-control editor"  style="height: 600px;" name="email_template">{{ templates('tasks_comments') ? templates('tasks_comments')->template_body : '' }}
                        </textarea>

                            </div>
                        </div>


                        <div class="form-group col-lg-12">

                            <button type="submit" class="btn btn-sm btn-primary tasks_comments">@lang('settings.save_changes')</button>
                        </div>
                
                
                </form>
         </div>



          <div class="tab-pane fade" id="tasks_attachment" role="tabpanel" aria-labelledby="tasks_attachment-tab">


                <form  action="{{ route('admin.update.templates') }}" method="post">
                    @csrf
                        <input type="hidden" name="email_group" value="tasks_attachment">
                        <input type="hidden" name="tab" value="task_email">


                        <div class="form-group">
                            <label class="col-lg-12">@lang('settings.subject') </label>
                            <div class="col-lg-12">
                                <input class="form-control" name="subject" value="{{ templates('tasks_attachment') ? templates('tasks_attachment')->subject : '' }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-12">@lang('settings.message')</label>
                            <div class="col-lg-12">
                        <textarea id="" class="form-control editor"  style="height: 600px;" name="email_template">{{ templates('tasks_attachment') ? templates('tasks_attachment')->template_body : '' }}
                        </textarea>

                            </div>
                        </div>


                        <div class="form-group col-lg-12">

                            <button type="submit" class="btn btn-sm btn-primary tasks_attachment">@lang('settings.save_changes')</button>
                        </div>
                
                
                </form>
         </div>




          <div class="tab-pane fade" id="tasks_updated" role="tabpanel" aria-labelledby="tasks_updated-tab">


                <form  action="{{ route('admin.update.templates') }}" method="post">
                    @csrf
                        <input type="hidden" name="email_group" value="tasks_updated">
                        <input type="hidden" name="tab" value="task_email">


                        <div class="form-group">
                            <label class="col-lg-12">@lang('settings.subject') </label>
                            <div class="col-lg-12">
                                <input class="form-control" name="subject" value="{{ templates('tasks_updated') ? templates('tasks_updated')->subject : '' }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-12">@lang('settings.message')</label>
                            <div class="col-lg-12">
                        <textarea id="" class="form-control editor"  style="height: 600px;" name="email_template">{{ templates('tasks_updated') ? templates('tasks_updated')->template_body : '' }}
                        </textarea>

                            </div>
                        </div>


                        <div class="form-group col-lg-12">

                            <button type="submit" class="btn btn-sm btn-primary tasks_updated">@lang('settings.save_changes')</button>
                        </div>
                
                
                </form>
         </div>





       












        </div>

      </section>

   