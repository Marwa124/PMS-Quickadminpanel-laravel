{{-- $email['user'] = array("activate_account", "change_email", "forgot_password", "registration", "reset_password", 'wellcome_email'); --}}

<div class="tab-pane  active show email-templates" id="v-pills-email-templates" role="tabpanel"
    aria-labelledby="v-pills-details-tab">



    <div class="card  card-custom">
        <h5 class="card-header " style="text-align: left">


            @lang('settings.email_templates')


              <div class="btn-group  pull-right">
                <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cogs"></i> @lang('settings.choose_template') 
                </button>
                
                <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                  <a href="{{ url('admin/settings/templates?tm=account_emails') }}" class="dropdown-item account_emails"   style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.account_emails')</a>
                  <a href="{{ url('admin/settings/templates?tm=invoicing_emails') }}" class="dropdown-item invoicing_emails"    style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.invoicing_emails')</a>
                  <a href="{{ url('admin/settings/templates?tm=task_email') }}" class="dropdown-item task_email"    style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.tasks_email')</a>
                  <a href="{{ url('admin/settings/templates?tm=bugs_email') }}" class="dropdown-item bugs_email"    style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.bugs_email')</a>
                  <a href="{{ url('admin/settings/templates?tm=project_emails') }}" class="dropdown-item project_emails"    style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.project_emails')</a>
                  <a href="{{ url('admin/settings/templates?tm=ticketing_emails') }}" class="dropdown-item ticketing_emails"    style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.ticketing_emails')</a>
                  <a href="{{ url('admin/settings/templates?tm=hrm_emails') }}" class="dropdown-item hrm_emails"    style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;" >@lang('settings.hrm_emails')</a>
                  <a href="{{ url('admin/settings/templates?tm=extra_emails') }}" class="dropdown-item extra_emails"   style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;">@lang('settings.extra_emails')</a>
                  <a href="{{ url('admin/settings/templates?tm=waiting_approval_proposal') }}" class="dropdown-item waiting_approval_proposal"    style="padding: 5px 5px;cursor: pointer;border-bottom : unset !important;" >@lang('settings.waiting_approval_proposal')</a>
                </div>
              </div>
   

        </h5>
        <div class="card-body">

           @if(request()->has('tm') && request('tm') == 'account_emails')
            @include('setting::partials.email_tabs.account_emails')
           @endif 

           @if(request()->has('tm') && request('tm') == 'task_email')
           @include('setting::partials.email_tabs.task_email')
           @endif 
           @if(request()->has('tm') && request('tm') == 'invoicing_emails')
           @include('setting::partials.email_tabs.invoicing_emails')
           @endif 

           @if(request()->has('tm') && request('tm') == 'bugs_email')
           @include('setting::partials.email_tabs.bugs_email')
           @endif 


           @if(request()->has('tm') && request('tm') == 'project_emails')
           @include('setting::partials.email_tabs.project_emails')
           @endif

           @if(request()->has('tm') && request('tm') == 'ticketing_emails')
           @include('setting::partials.email_tabs.ticketing_emails')
           @endif

           @if(request()->has('tm') && request('tm') == 'hrm_emails')
           @include('setting::partials.email_tabs.hrm_emails')
           @endif

           @if(request()->has('tm') && request('tm') == 'extra_emails')
           @include('setting::partials.email_tabs.extra_emails')
           @endif

           @if(request()->has('tm') && request('tm') == 'waiting_approval_proposal')
           @include('setting::partials.email_tabs.waiting_approval_proposal') 
           @endif
           
           


                 
     



        </div>
    </div>





</div>

@push('settings')


<script>
function show_tabs(tab){
$('.section_tab').addClass('d-none')
$('.'+tab+'_tabs').removeClass('d-none')

    $('.section_tab .nav-link').removeClass('active')

    $('.section_tab .first_link').addClass('active')
    $('.section_tab .first_link').addClass('show')
    $('.section_tab .first_div').addClass('active')
    $('.section_tab .first_div').addClass('show')
    $('.section_tab .first_div').removeClass('d-none')



}

</script>
@if(session()->has('tab'))
<script>
$(document).ready(function(){
    var tab = '{{ session()->get('tab','account_emails') }}'

    $('.section_tab').addClass('d-none')
    $('.'+tab+'_tabs').removeClass('d-none')



    $('.section_tab .first_link').addClass('active')
    $('.section_tab .first_link').addClass('show')
    $('.section_tab .first_div').addClass('active')
    $('.section_tab .first_div').addClass('show')

})

</script>
@endif

<script>

    var template = '{{ session()->get('template','activate_account') }}'
    $(document).ready(function(){

      
        document.getElementById(template).style.display ='inline-block';
        document.getElementById(template).style.opacity =1;

        $('.section_tab .nav-link').removeClass('active')
        $('.section_tab .tab-pane').removeClass('active')

        $('#'+template+'-tab').addClass('active');

// console.log('#'+template+'-tab')
        // $('.section_tab .first_link').addClass('active')
        // $('.section_tab .first_link').addClass('show')
        // $('.section_tab .first_div').addClass('active')
        // $('.section_tab .first_div').addClass('show')

        })

        $('.section_tab .nav-link').click(function(){

            document.getElementById(template).classList.add('d-none');

        });

        $('#'+template+'-tab').click(function(){

                document.getElementById(template).classList.remove('d-none');
            
        });

    
                
</script>




@endpush