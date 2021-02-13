       <!-- Section: Live preview -->
     <section class="section_tab animate account_emails_tabs ">
      
        <ul class="nav nav-tabs" id="myTab" role="tablist">


          <li class="nav-item waves-effect waves-light">
            <a class="nav-link active" id="activate_account-tab" data-toggle="tab" href="#activate_account" role="tab" aria-controls="activate_account"
             aria-selected="false">@lang('settings.activate_account')</a>
          </li>

          <li class="nav-item waves-effect waves-light">
            <a class="nav-link " id="change_email-tab" data-toggle="tab" 
            href="#change_email" role="tab" aria-controls="change_email" aria-selected="false">@lang('settings.change_email')</a>
          </li>

          <li class="nav-item waves-effect waves-light">
            <a class="nav-link " id="forgot_password-tab" data-toggle="tab"
             href="#forgot_password" role="tab" aria-controls="forgot_password" aria-selected="true">@lang('settings.forgot_password')</a>
          </li>

          <li class="nav-item waves-effect waves-light">
            <a class="nav-link " id="registration-tab" data-toggle="tab"
             href="#registration" role="tab" aria-controls="registration" aria-selected="true">@lang('settings.register_email')</a>
          </li>


          <li class="nav-item waves-effect waves-light">
            <a class="nav-link " id="reset_password-tab" data-toggle="tab"
             href="#reset_password" role="tab" aria-controls="reset_password" aria-selected="true">@lang('settings.reset_password')</a>
          </li>
          <li class="nav-item waves-effect waves-light">
            <a class="nav-link " id="wellcome_email-tab" data-toggle="tab"
             href="#wellcome_email" role="tab" aria-controls="welcome_mail" aria-selected="true">@lang('settings.welcome_mail')</a>
          </li>




 



        </ul>




        <div class="tab-content" id="myTabContent">



          <div class="tab-pane fade active show" id="activate_account" role="tabpanel" aria-labelledby="activate-tab">

            <form action="{{ route('admin.update.templates') }}" method="post">
                @csrf

        
                <input type="hidden" name="email_group" value="activate_account">
                <input type="hidden" name="tab" value="account_emails">

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
                        <input type="hidden" name="tab" value="account_emails">


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





          <div class="tab-pane fade " id="forgot_password" role="tabpanel" aria-labelledby="forgot_password-tab">
            <form  action="{{ route('admin.update.templates') }}" method="post">
                @csrf
                <input type="hidden" name="email_group" value="forgot_password">
                <input type="hidden" name="tab" value="account_emails">


                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.subject') </label>
                    <div class="col-lg-12">
                        <input class="form-control" name="subject" value="{{ templates('forgot_password') ? templates('forgot_password')->subject : '' }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.message')</label>
                    <div class="col-lg-12">
                <textarea id="" class="form-control editor"  style="height: 600px;" name="email_template">{{ templates('forgot_password') ? templates('forgot_password')->template_body : '' }}
                </textarea>

                    </div>
                </div>
        
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-sm btn-primary forgot_password">@lang('settings.save_changes')</button>
                </div>
        </form>
        
        
        </div>



        <div class="tab-pane fade " id="registration" role="tabpanel" aria-labelledby="registration-tab">
            <form  action="{{ route('admin.update.templates') }}" method="post">
                @csrf
                <input type="hidden" name="email_group" value="registration">
                <input type="hidden" name="tab" value="account_emails">


                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.subject') </label>
                    <div class="col-lg-12">
                        <input class="form-control" name="subject" value="{{ templates('registration') ? templates('registration')->subject : '' }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.message')</label>
                    <div class="col-lg-12">
                <textarea id="" class="form-control editor"  style="height: 600px;" name="email_template">{{ templates('registration') ? templates('registration')->template_body : '' }}
                </textarea>

                    </div>
                </div>
        
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-sm btn-primary registration">@lang('settings.save_changes')</button>
                </div>
        </form>
        
        
        </div>
        <div class="tab-pane fade " id="reset_password" role="tabpanel" aria-labelledby="reset_password-tab">
            <form  action="{{ route('admin.update.templates') }}" method="post">
                @csrf
                <input type="hidden" name="email_group" value="reset_password">
                <input type="hidden" name="tab" value="account_emails">


                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.subject') </label>
                    <div class="col-lg-12">
                        <input class="form-control" name="subject" value="{{ templates('reset_password') ? templates('reset_password')->subject : '' }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.message')</label>
                    <div class="col-lg-12">
                <textarea id="" class="form-control editor"  style="height: 600px;" name="email_template">{{ templates('reset_password') ? templates('reset_password')->template_body : '' }}
                </textarea>

                    </div>
                </div>
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-sm btn-primary reset_password">@lang('settings.save_changes')</button>
                </div>
        
        </form>
        
        
        </div>
        <div class="tab-pane fade " id="wellcome_email" role="tabpanel" aria-labelledby="wellcome_email-tab">
            <form  action="{{ route('admin.update.templates') }}" method="post">
                @csrf
                <input type="hidden" name="email_group" value="wellcome_email">
                <input type="hidden" name="tab" value="account_emails">


                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.subject') </label>
                    <div class="col-lg-12">
                        <input class="form-control" name="subject" value="{{ templates('wellcome_email') ? templates('wellcome_email')->subject : '' }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-12">@lang('settings.message')</label>
                    <div class="col-lg-12">
                <textarea id="" class="form-control editor"  style="height: 600px;" name="email_template">{{ templates('wellcome_email') ? templates('wellcome_email')->template_body : '' }}
                </textarea>

                    </div>
                </div>
        
                <div class="form-group col-lg-12">
                    <button type="submit" class="btn btn-sm btn-primary wellcome_email">@lang('settings.save_changes')</button>
                </div>
            </form>
        
        
        </div>








        </div>

      </section>
