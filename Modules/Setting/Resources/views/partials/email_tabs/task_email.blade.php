       <!-- Section: Live preview -->
       <section class="section_tab animate d-none task_email_tabs">
      
        <ul class="nav nav-tabs" id="myTab" role="tablist">


          <li class="nav-item waves-effect waves-light">
            <a class="nav-link active" id="activate_account-tab" data-toggle="tab" href="#activate_account" role="tab" aria-controls="activate_account"
             aria-selected="false">@lang('settings.activate_account')</a>
          </li>

          <li class="nav-item waves-effect waves-light">
            <a class="nav-link " id="change_email-tab" data-toggle="tab" 
            href="#change_email" role="tab" aria-controls="change_email" aria-selected="false">@lang('settings.change_email')</a>
          </li>

     




 



        </ul>




        <div class="tab-content" id="myTabContent">



          <div class="tab-pane fade active show" id="activate_account" role="tabpanel" aria-labelledby="activate-tab">

            <form action="{{ route('admin.update.templates') }}" method="post">
                @csrf
        
                <input type="hidden" name="email_group" value="activate_account">

                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.subject') </label>
                    <div class="col-lg-12">
                        <input class="form-control subject_activate_account" name="subject" value="{{ templates('activate_account') ? templates('activate_account')->subject : '' }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.message')</label>
                    <div class="col-lg-12">
                <textarea id="" class="form-control editor text_activate_account"  style="height: 600px;" name="email_template">{{ templates('activate_account') ? templates('activate_account')->template_body : '' }}
                </textarea>

                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                
                        <button   type="submit" class="btn btn-sm btn-primary activate_account">@lang('settings.save_changes')</button>
                    </div> 
                </div>
            
            </form>
        </div>



          <div class="tab-pane fade" id="change_email" role="tabpanel" aria-labelledby="change_email-tab">


                <form  action="{{ route('admin.update.templates') }}" method="post">
                    @csrf
                        <input type="hidden" name="email_group" value="change_email">

                        <div class="form-group">
                            <label class="col-lg-12">@lang('settings.subject') </label>
                            <div class="col-lg-12">
                                <input class="form-control" name="subject" value="{{ templates('change_email') ? templates('change_email')->subject : '' }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-12">@lang('settings.message')</label>
                            <div class="col-lg-12">
                        <textarea id="" class="form-control editor"  style="height: 600px;" name="email_template">{{ templates('change_email') ? templates('change_email')->template_body : '' }}
                        </textarea>

                            </div>
                        </div>


                        <div class="form-group col-lg-12">

                            <button type="submit" class="btn btn-sm btn-primary change_email">@lang('settings.save_changes')</button>
                        </div>
                
                
                </form>
         </div>





       












        </div>

      </section>

   