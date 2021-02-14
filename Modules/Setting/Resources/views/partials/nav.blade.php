<div class="card">

    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">


        <a class="nav-link {{ request()->is('admin/settings/details') ? 'active' : ''}} "  
          href="{{ route('admin.settings.details.index') }}"
          
           aria-selected="true"><i class="fa fa-fw fa-info-circle"></i>@lang('settings.company_details') 
        
        </a>

        
        <a class="nav-link {{ request()->is('admin/settings/system') ? 'active' : ''}}  "  
            href="{{ route('admin.settings.system.index') }}"
            
             aria-selected="true"><i class="fa fa-fw fa-info-circle"></i>@lang('settings.system_settings') 
          
          </a>

  
          <a class="nav-link {{ request()->is('admin/settings/email') ? 'active' : ''}}  "  
            href="{{ route('admin.settings.email.index') }}"
            
             aria-selected="true"><i class="fa fa-fw fa-info-circle"></i>@lang('settings.email_settings')
          
          </a>

          <a class="nav-link {{ request()->is('admin/settings/sms') ? 'active' : ''}}  "  
            href="{{ route('admin.settings.sms.index') }}"
            
             aria-selected="true"><i class="fa fa-fw fa-info-circle"></i>@lang('settings.sms_settings') 
          
          </a>

   
      
        <a href="{{ url('admin/settings/templates?tm=account_emails') }}"
         class="nav-link  {{ request()->is('admin/settings/templates') ? 'active' : ''}}"
         
            aria-selected="true"><i class="fa fa-fw fa-envelope"></i>@lang('settings.email_templates')  
        
        </a>

            
        <a href="{{ route('admin.settings.invoice.index') }}"
         class="nav-link  {{ request()->is('admin/settings/invoice') ? 'active' : ''}}"
         
            aria-selected="true"><i class="fa fa-fw fa-envelope"></i>@lang('settings.invoice_settings')   
        
        </a>


        <a href="{{ route('admin.settings.estimate.index') }}"
           class="nav-link {{ request()->is('admin/settings/estimate') ? 'active' : ''}}"        
           aria-selected="true"><i class="fa fa-fw fa-file"></i>@lang('settings.estimate_settings')   
       
       </a>
        <a href="{{ route('admin.settings.proposal.index') }}"
           class="nav-link {{ request()->is('admin/settings/proposal') ? 'active' : ''}}"        
           aria-selected="true"><i class="fa fa-fw fa-leaf"></i>@lang('settings.proposal_settings')   
       
        </a>
        <a href="{{ route('admin.settings.purchase.index') }}"
           class="nav-link {{ request()->is('admin/settings/purchase') ? 'active' : ''}}"        
           aria-selected="true"><i class="fa fa-fw fa-leaf"></i>@lang('settings.purchase_settings')   
       
        </a>






    </div>
</div>