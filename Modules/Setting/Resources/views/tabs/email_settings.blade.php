<div class="tab-pane  email-settings" id="v-pills-email-settings" role="tabpanel"
aria-labelledby="v-pills-details-tab">
<div class="card  card-custom">
   <h5 class="card-header " style="text-align: left">  
      
         
               {{-- @lang('settings.email_settings') --}}

               <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a style="cursor:pointer" data-toggle="tab"class=" nav-link smtp_click active" >@lang('settings.smtp')</a>
                </li>
                <li class="nav-item">
                  <a style="cursor:pointer"  class=" nav-link mailgunclick" >@lang('settings.mailgun')</a>
                </li>
        
              </ul>
              
        
      
   </h5>



   <div class="card-body">

    {{-- <div class="tab-content"> --}}



        <div id="smtp"  class="container   smtp_tab"><br>

            <form action="{{ route('admin.mail_smtp.store') }}" method="POST">

                @csrf
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.smtp_email')</label>
                    <div class="col-lg-6">
                        <input type="email" required="" class="form-control"
                               value="{{ old('smtp_email',settings('smtp_email')) }}" name="smtp_email"
                               data-type="email" data-required="true">
                    </div>
    
    
    
                </div>
    
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.smtp_sender_name')</label>
                    <div class="col-lg-6">
                        <input type="text" required="" class="form-control"
                               value="{{ old('smtp_sender_name',settings('smtp_sender_name')) }}" name="smtp_sender_name"
                              >
                    </div>
    
    
    
                </div>
    

            <input type="hidden" name="smtp_protocol" value="smtp">
    
            <div class="">
    
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.smtp_mail_host')</label>
                    <div class="col-lg-6">
                        <input type="text" required="" class="form-control"
                            value="{{ old('smtp_host',settings('smtp_host')) }}" name="smtp_host">
                    </div>
                </div>
    
    
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.smtp_mail_user')</label>
                    <div class="col-lg-6">
                        <input type="mail" required="" class="form-control"
                            value="{{ old('smtp_user',settings('smtp_user')) }}" name="smtp_user">
                    </div>
                </div>
    
    
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.smtp_mail_password')</label>
                    <div class="col-lg-6">
                        <input type="password" required="" class="form-control"
                            value="{{ old('smtp_password',settings('smtp_password')) }}" name="smtp_password">
                    </div>
                </div>
    
    
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.smtp_mail_port')</label>
                    <div class="col-lg-6">
                        <input type="text" required="" class="form-control"
                            value="{{ old('smtp_port',settings('smtp_port')) }}" name="smtp_port">
                    </div>
                </div>
    
    
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.smtp_mail_encryption')</label>
                    <div class="col-lg-6">
    
                        <select name="smtp_encryption" required="" class="form-control">
                            <option  
                           
                   >
                    @lang('settings.mail_encryption')
                   </option>
                            <option  
                                     value="ssl" 
                                     @if(old('smtp_encryption',settings('smtp_encryption')) == 'ssl') {{ 'selected' }} @endif 
                            >
                             @lang('settings.ssl')
                            </option>
                            <option  
                                     value="tls" 
                                     @if(old('smtp_encryption',settings('smtp_encryption')) == 'tls') {{ 'selected' }} @endif
                            >
                             @lang('settings.tls')
                            </option>
                          
                        </select>
    
                  
                    </div>
                </div>
    
    
    
    
    
            </div>
    
    
            <div class="row">
           
                <div class="col-md-7">
                    
                    <button  formaction="{{ route('admin.mail_smtp.store') }}" style="padding: 6px;border-radius: 0px;"  class="btn btn-sm btn-primary">@lang('settings.save_changes')</button>
                </div>
            </div> 
    
    
    
    
    
    
        
    
    
            </form>
        </div>


        <div id="mailgun" class="container mailgun d-none"><br>


            <form action="{{ route('admin.mail_mailgun.store') }}" method="POST">

                @csrf
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.mailgun_email')<span
                            class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="email" required="" class="form-control"
                               value="{{ old('mailgun_email',settings('mailgun_email')) }}" name="mailgun_email"
                               data-type="email" data-required="true">
                    </div>
    
    
    
                </div>
    
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.mailgun_sender_name')<span
                            class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" required="" class="form-control"
                               value="{{ old('mailgun_sender_name',settings('mailgun_sender_name')) }}" name="mailgun_sender_name"
                              >
                    </div>
    
    
    
                </div>
    
    
    
        

            <input type="hidden" value="mailgun" name="mailgun_protocol">
    
    
            <div class="">
    
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.mailgun_host')</label>
                    <div class="col-lg-6">
                        <input type="text" required="" class="form-control"
                            value="{{ old('mailgun_host',settings('mailgun_host')) }}" name="mailgun_host">
                    </div>
                </div>
    
    
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.mailgun_user')</label>
                    <div class="col-lg-6">
                        <input type="mailgun" required="" class="form-control"
                            value="{{ old('mailgun_user',settings('mailgun_user')) }}" name="mailgun_user">
                    </div>
                </div>
    
    
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.mailgun_password')</label>
                    <div class="col-lg-6">
                        <input type="password" required="" class="form-control"
                            value="{{ old('mailgun_password',settings('mailgun_password')) }}" name="mailgun_password">
                    </div>
                </div>
    
    
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.mailgun_port')</label>
                    <div class="col-lg-6">
                        <input type="text" required="" class="form-control"
                            value="{{ old('mailgun_port',settings('mailgun_port')) }}" name="mailgun_port">
                    </div>
                </div>
    
    
                <div class="row">
                    <label class="col-lg-3 control-label">@lang('settings.mailgun_encryption')</label>
                    <div class="col-lg-6">
    
                        <select name="mailgun_encryption" required="" class="form-control">
                            <option  
                           
                   >
                    @lang('settings.mailgun_encryption')
                   </option>
                            <option  
                                     value="ssl" 
                                     @if(old('mailgun_encryption',settings('mailgun_encryption')) == 'ssl') {{ 'selected' }} @endif 
                            >
                             @lang('settings.ssl')
                            </option>
                            <option  
                                     value="tls" 
                                     @if(old('mailgun_encryption',settings('mailgun_encryption')) == 'tls') {{ 'selected' }} @endif
                            >
                             @lang('settings.tls')
                            </option>
                          
                        </select>
    
                  
                    </div>
                </div>
    
    
    
    
    
            </div>
    
    
            <div class="row">
           
                <div class="col-md-7">
                    
                    <button  formaction="{{ route('admin.mail_mailgun.store') }}" style="padding: 6px;border-radius: 0px;"  class="btn btn-sm btn-primary">@lang('settings.save_changes')</button>
                </div>
            </div> 
    
    
    
    
    
    
        
    
    
            </form>
        </div>


        {{-- <div id="menu2" class="container tab-pane fade"><br>
          <h3>Menu 2</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div> --}}



      {{-- </div> --}}


     <!-- Tab panes -->
  

       
      
    </div>
</div>






<div class="card card-custom">
    <header class="card-heading "></header>
    <div class="card-body">
        <form method="post" action="{{ route('admin.test_mail') }}" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label class="col-lg-3 control-label"></label>
                <div class="col-lg-6">
                    <input type="email" required="" class="form-control" value="" name="test_email">
                </div>
                <div class="col-lg-3">
                    <label for="smtp">@lang('settings.smtp')</label>
                    <input type="radio" name="mailer" value="smtp" id="smtp">
                    <label for="mailgun">@lang('settings.mailgun')</label>
                    <input type="radio" name="mailer" value="mailgun" id="mailgun">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label"></label>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-sm btn-primary">@lang('settings.send_test_mail')</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@section('scripts')
{{-- <script>

 function show_postmark(){
    if(document.querySelector('#post_mark:checked') !== null){
        document.querySelector('#postmark_config').style.display =''

    }else{
        document.querySelector('#postmark_config').style.display ='none'
    }
 }
</script> --}}

<script>
      $('.mailgunclick').click(function(){
          $('.mailgun').removeClass('d-none');
          $('.smtp_tab').addClass('d-none');
          $(this).addClass('active');
          $('.smtp_click').removeClass('active');
      });

      $('.smtp_click').click(function(){
          $('.smtp_tab').removeClass('d-none');
          $('.mailgun').addClass('d-none');
          $(this).addClass('active');
          $('.mailgunclick').removeClass('active');
      });


    
    </script>
@endsection