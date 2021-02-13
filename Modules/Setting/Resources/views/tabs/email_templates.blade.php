

<div class="tab-pane   email-templates" id="v-pills-email-templates" role="tabpanel"
    aria-labelledby="v-pills-details-tab">



    <div class="card  card-custom">
        <h5 class="card-header " style="text-align: left">


            @lang('settings.email_templates')


              <div class="btn-group  pull-right">
                <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cogs"></i> @lang('settings.choose_template') 
                </button>
                
                <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                  <a class="dropdown-item account_emails" onclick="show_tabs('account_emails')"  style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.account_emails')</a>
                  <a class="dropdown-item invoicing_emails" onclick="show_tabs('invoicing_emails')"   style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.invoicing_emails')</a>
                  <a class="dropdown-item task_email"  onclick="show_tabs('task_email')"  style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.tasks_email')</a>
                  <a class="dropdown-item bugs_email" onclick="show_tabs('bugs_email')"   style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.bugs_email')</a>
                  <a class="dropdown-item project_emails" onclick="show_tabs('project_emails')"   style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.project_emails')</a>
                  <a class="dropdown-item ticketing_emails" onclick="show_tabs('ticketing_emails')"   style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.ticketing_emails')</a>
                  <a class="dropdown-item hrm_emails" onclick="show_tabs('hrm_emails')"   style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;" >@lang('settings.hrm_emails')</a>
                  <a class="dropdown-item extra_emails" onclick="show_tabs('extra_emails')"   style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.extra_emails')</a>
                  <a class="dropdown-item waiting_approval_proposal"  onclick="show_tabs('waiting_approval_proposal')"  style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;" >@lang('settings.waiting_approval_proposal')</a>
                </div>
              </div>
   

        </h5>
        <div class="card-body">

          
            @include('setting::partials.email_tabs.account_emails')

            @include('setting::partials.email_tabs.task_email')
            @include('setting::partials.email_tabs.invoicing_emails')

                 
     



        </div>
    </div>





</div>

@push('settings')


<script>
function show_tabs(tab){
$('.section_tab').addClass('d-none')
$('.'+tab+'_tabs').removeClass('d-none')
}

</script>
@if(session()->has('tab'))
<script>
$(document).ready(function(){
    var tab = '{{ session()->get('tab','account_emails') }}'

    $('.section_tab').addClass('d-none')
    $('.'+tab+'_tabs').removeClass('d-none')

})

</script>
@endif
@if(session()->has('tab'))
<script>
$(document).ready(function(){


})

</script>
@endif
@if(session()->has('template'))
<script>

    var template = '{{ session()->get('template','activate_account') }}'
    $(document).ready(function(){

      
        document.getElementById(template).style.display ='inline-block';
        document.getElementById(template).style.opacity =1;

        $('.nav-link').removeClass('active')

        $('#'+template+'-tab').addClass('active');

        })

        $('.nav-link').click(function(){

            document.getElementById(template).classList.add('d-none');

        });

        $('#'+template+'-tab').click(function(){

                document.getElementById(template).classList.remove('d-none');
            
        });
        
</script>



@endif
@endpush