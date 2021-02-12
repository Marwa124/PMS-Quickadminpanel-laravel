<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
        <!-- {{ trans('panel.site_title') }} -->
            <div style="width:100px; margin:10px">
                <img style="width:100%;" src="https://onetecgroup.com/setting/OTG_1605774993.png" alt="company logo">
            </div>
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <div class="input-group sidebar-search mb-3">
                <input type="text" class="form-control sidebar-search__input" placeholder="Search in menu"
                       aria-label="Search in menu" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </li>
        <li>

        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    {{-- @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan --}}
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles-management.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon sub-dropdown">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon sub-dropdown">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('basic_c_r_m_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.basicCRM.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('crm_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-statuses.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/crm-statuses") || request()->is("admin/crm-statuses/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon sub-dropdown">

                                </i>
                                {{ trans('cruds.crmStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_customer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-customers.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/crm-customers") || request()->is("admin/crm-customers/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-user-plus c-sidebar-nav-icon sub-dropdown">

                                </i>
                                {{ trans('cruds.crmCustomer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_note_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-notes.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/crm-notes") || request()->is("admin/crm-notes/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-sticky-note c-sidebar-nav-icon sub-dropdown">

                                </i>
                                {{ trans('cruds.crmNote.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('crm_document_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.crm-documents.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/crm-documents") || request()->is("admin/crm-documents/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-folder c-sidebar-nav-icon sub-dropdown">

                                </i>
                                {{ trans('cruds.crmDocument.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('finance_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-money c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.finance.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">

                    @can('account_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.accounts.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/accounts") || request()->is("admin/accounts/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-money-check-alt c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.account.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('balance_sheet')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("finance.admin.balance_sheet") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/balance_sheet") || request()->is("admin/finance/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-file-invoice-dollar c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.finance.balance_sheet') }}
                            </a>
                        </li>
                    @endcan
                    @can('payment_method')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("finance.admin.payment_method.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/payment_method") || request()->is("admin/payment_method/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-credit-card c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.finance.payment_method') }}
                            </a>
                        </li>
                    @endcan
                    @can('payment_method')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("finance.admin.payment_received.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payment_received") || request()->is("admin/payment_received/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-credit-card c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.finance.payment_received') }}
                            </a>
                        </li>
                    @endcan
                    @can('transfer')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("finance.admin.transfers.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/transfers") || request()->is("admin/finance/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-trademark c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.finance.transfers') }}
                            </a>
                        </li>
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("finance.admin.transfers_report") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/transfers") || request()->is("admin/finance/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.transfers.transfers_report') }}
                            </a>
                        </li>
                    @endcan


                    @can('expenses')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("finance.admin.expenses_category.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/expenses_category") || request()->is("admin/finance/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-bookmark c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.finance.expenses_category') }}
                            </a>
                        </li>
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("finance.admin.expenses.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/expenses") || request()->is("admin/finance/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.finance.expenses') }}
                            </a>
                        </li>
                    @endcan
                    @can('deposits')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("finance.admin.deposits_category.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/deposits_category") || request()->is("admin/finance/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-bookmark c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.finance.deposits_category') }}
                            </a>
                        </li>
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("finance.admin.deposits.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/deposits") || request()->is("admin/finance/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.finance.deposits') }}
                            </a>
                        </li>
                    @endcan
                    @can('invoice')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("finance.admin.invoices.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/invoices") || request()->is("admin/finance/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-newspaper c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.finance.invoices') }}
                            </a>
                        </li>
                    @endcan

                    @can('office_asset')
                        <li class="c-sidebar-nav-dropdown">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-globe-africa c-sidebar-nav-icon sub-parent-dropdown">
                                </i>
                                {{ trans('cruds.finance.office_asset') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('stock_category')

                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("finance.admin.stock_category.index") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/stock_category") || request()->is("admin/finance/*") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-trademark c-sidebar-nav-icon self-item-link">

                                            </i>
                                            {{ trans('cruds.finance.stock_category') }}
                                        </a>
                                    </li>
                                @endcan
                                {{--@can('stock_access')--}}
                                <li class="c-sidebar-nav-item">
                                    <a href="{{ route("finance.admin.stocks.index") }}"
                                       class="c-sidebar-nav-link {{ request()->is("admin/stocks") || request()->is("admin/finance/*") ? "active" : "" }}">
                                        <i class="fa-fw fas fa-trademark c-sidebar-nav-icon self-item-link">

                                        </i>
                                        {{ trans('cruds.finance.stocks') }}
                                    </a>
                                </li>
                                {{--@endcan--}}
                                {{--@can('manage_stock')--}}

                                <li class="c-sidebar-nav-dropdown">
                                    <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                        <i class="fa-fw fas fa-globe-africa c-sidebar-nav-icon sub-parent-dropdown">
                                        </i>
                                        {{ trans('cruds.finance.manage_stock') }}
                                    </a>
                                    <ul class="c-sidebar-nav-dropdown-items">
                                        <li class="c-sidebar-nav-item">
                                            <a href="{{ route("finance.admin.stocks.history") }}"
                                               class="c-sidebar-nav-link {{ request()->is("admin/stock") || request()->is("admin/finance/*") ? "active" : "" }}">
                                                <i class="fa-fw fas fa-trademark c-sidebar-nav-icon self-item-link">

                                                </i>
                                                {{ trans('cruds.finance.stock_history') }}
                                            </a>
                                        </li>
                                    </ul>
                                {{--@endcan--}}
                                {{--@can('assign_stocks')--}}

                                <li class="c-sidebar-nav-dropdown">
                                    <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                        <i class="fa-fw fas fa-globe-africa c-sidebar-nav-icon sub-parent-dropdown">
                                        </i>
                                        {{ trans('cruds.finance.assign_stocks') }}
                                    </a>
                                    <ul class="c-sidebar-nav-dropdown-items">
                                        <li class="c-sidebar-nav-item">
                                            <a href="{{ route("finance.admin.assign_stocks.index") }}"
                                               class="c-sidebar-nav-link {{ request()->is("admin/assign_stocks") || request()->is("admin/finance/*") ? "active" : "" }}">
                                                <i class="fa-fw fas fa-trademark c-sidebar-nav-icon self-item-link">

                                                </i>
                                                {{ trans('cruds.finance.assign_stocks') }}
                                            </a>
                                        </li>
                                        <li class="c-sidebar-nav-item">
                                            <a href="{{ route("finance.admin.assign_stocks.report") }}"
                                               class="c-sidebar-nav-link {{ request()->is("admin/assign_stocks") || request()->is("admin/finance/*") ? "active" : "" }}">
                                                <i class="fa-fw fas fa-trademark c-sidebar-nav-icon self-item-link">

                                                </i>
                                                {{ trans('cruds.finance.assign_stocks_report') }}
                                            </a>
                                        </li>
                                    </ul>
                                {{--@endcan--}}
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("finance.admin.stocks.report") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/stocks") || request()->is("admin/finance/*") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-trademark c-sidebar-nav-icon self-item-link">

                                            </i>
                                            {{ trans('cruds.finance.stocks_report') }}
                                        </a>
                                    </li>

                            </ul>
                        </li>











                    @endcan


                </ul>
            </li>
        @endcan
        @can('hr_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.hr.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('account_detail_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.account-details.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/account-details") || request()->is("admin/account-details/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon self-item-link">
                                </i>
                                Employees Details
                                {{-- {{ trans('cruds.accountDetail.title') }} --}}
                            </a>
                        </li>
                    @endcan
                    @can('department_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.departments.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-id-card-alt c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.department.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('attendances_access')
                        <li class="c-sidebar-nav-dropdown">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw far fa-edit c-sidebar-nav-icon sub-parent-dropdown">

                                </i>
                                {{ trans('cruds.attendance.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('attendances_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("hr.admin.attendances.index") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/attendances") || request()->is("admin/attendances/*") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon sub-dropdown">

                                            </i>
                                            {{ trans('cruds.attendances.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('daily_attendance_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("hr.admin.daily-attendances.index") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/daily-attendances") || request()->is("admin/daily-attendances/*") ? "active" : "" }}">
                                            <i class="fa-fw far fa-list-alt c-sidebar-nav-icon sub-dropdown">

                                            </i>
                                            {{ trans('cruds.dailyAttendance.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('monthly_attendance_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("hr.admin.monthly-attendances.index") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/monthly-attendances") || request()->is("admin/monthly-attendances/*") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-folder c-sidebar-nav-icon sub-dropdown">

                                            </i>
                                            {{ trans('cruds.monthlyAttendance.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('employee_request_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.requests.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/client-meetings") || request()->is("admin/client-meetings/*") ? "active" : "" }}">
                                <i class="fa-fw far fa-list-alt c-sidebar-nav-icon self-item-link"></i>
                                Requests
                            </a>
                        </li>
                    @endcan
                    @can('designation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.designations.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/designations") || request()->is("admin/designations/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-puzzle-piece c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.designation.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('overtime_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.overtimes.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/overtimes") || request()->is("admin/overtimes/*") ? "active" : "" }}">
                                <i class="fa-fw far fa-clock c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.overtime.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('holiday_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.holidays.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/holidays") || request()->is("admin/holidays/*") ? "active" : "" }}">
                                <i class="fa-fw far fa-calendar-plus c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.holiday.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('training_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.trainings.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/trainings") || request()->is("admin/trainings/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-suitcase c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.training.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('leave_application_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.leave-applications.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/leave-applications") || request()->is("admin/leave-applications/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-plane c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.leaveApplication.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('meeting_minute_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.meeting-minutes.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/meeting-minutes") || request()->is("admin/meeting-minutes/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.meetingMinute.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('employee_award_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.employee-awards.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/employee-awards") || request()->is("admin/employee-awards/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-trophy c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.employeeAward.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('recruitment_access')
                        <li class="c-sidebar-nav-dropdown">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-globe-africa c-sidebar-nav-icon sub-parent-dropdown">

                                </i>
                                {{ trans('cruds.recruitment.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('job_circular_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("hr.admin.job-circulars.index") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/job-circulars") || request()->is("admin/job-circulars/*") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-ticket-alt c-sidebar-nav-icon sub-dropdown">

                                            </i>
                                            {{ trans('cruds.jobCircular.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('job_application_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("hr.admin.job-applications.index") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/job-applications") || request()->is("admin/job-applications/*") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-compass c-sidebar-nav-icon sub-dropdown">

                                            </i>
                                            {{ trans('cruds.jobApplication.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('account_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.accounts.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/accounts") || request()->is("admin/accounts/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-money-check-alt c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.account.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('vacation_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.vacations.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/vacations") || request()->is("admin/vacations/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-shuttle-van c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.vacation.title') }}
                            </a>
                        </li>
                    @endcan
                    {{-- Evaluations --}}
                    @can('evaluations')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.evaluations.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-ticket-alt c-sidebar-nav-icon self-item-link">
                                </i>
                                Evaluations
                            </a>
                        </li>
                    @endcan

                    @can('settings')
                        <li class="c-sidebar-nav-dropdown">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-globe-africa c-sidebar-nav-icon sub-parent-dropdown">
                                </i>
                                Settings
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('department_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("hr.admin.departments.list") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-ticket-alt c-sidebar-nav-icon sub-dropdown">
                                            </i>
                                            Department List
                                        </a>
                                    </li>
                                @endcan
                                @can('leave_category_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("hr.admin.leave-categories.index") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/leave-categories") || request()->is("admin/leave-categories/*") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon sub-dropdown">

                                            </i>
                                            {{ trans('cruds.leaveCategory.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('set_time_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("hr.admin.set-times.index") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/set-times") || request()->is("admin/set-times/*") ? "active" : "" }}">
                                            <i class="fa-fw far fa-clock c-sidebar-nav-icon sub-dropdown">

                                            </i>
                                            {{ trans('cruds.setTime.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('penalty_category_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("hr.admin.penalty-categories.index") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/penalty-categories") || request()->is("admin/penalty-categories/*") ? "active" : "" }}">
                                            <i class="fa-fw far fa-edit c-sidebar-nav-icon sub-dropdown">

                                            </i>
                                            {{ trans('cruds.penaltyCategory.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan


                </ul>
            </li>
        @endcan

        @can('payroll_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-dollar-sign c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.payroll.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('salary_template_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("payroll.admin.salary-templates.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/salary-templates") || request()->is("admin/salary-templates/*") ? "active" : "" }}">
                                <i class="fa-fw far fa-circle c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.salaryTemplate.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('hourly_rate_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("payroll.admin.hourly-rates.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/hourly-rates") || request()->is("admin/hourly-rates/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-hourglass-end c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.hourlyRate.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('salary_payment_detail_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("payroll.admin.salary-payment-details.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/salary-payment-details") || request()->is("admin/salary-payment-details/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-circle c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.salaryPaymentDetail.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('salary_payment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("payroll.admin.salary-payments.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/salary-payments") || request()->is("admin/salary-payments/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-circle c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.salaryPayment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('payroll_summary')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("payroll.admin.payroll-summary") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/payroll-summary") || request()->is("admin/payroll-summary/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-circle c-sidebar-nav-icon self-item-link">
                                </i>
                                Payroll Summary
                            </a>
                        </li>
                    @endcan
                    {{-- @can('salary_payment_deduction_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("payroll.admin.salary-payment-deductions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/salary-payment-deductions") || request()->is("admin/salary-payment-deductions/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.salaryPaymentDeduction.title') }}
                            </a>
                        </li>
                    @endcan --}}
                    {{-- @can('salary_payslip_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("payroll.admin.salary-payslips.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/salary-payslips") || request()->is("admin/salary-payslips/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.salaryPayslip.title') }}
                            </a>
                        </li>
                    @endcan --}}
                    @can('advance_salary_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("payroll.admin.advance-salaries.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/advance-salaries") || request()->is("admin/advance-salaries/*") ? "active" : "" }}">
                                <i class="fa-fw fab fa-cc-mastercard c-sidebar-nav-icon self-item-link">

                                </i>
                                {{ trans('cruds.advanceSalary.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('time_management_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-clock c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.timeManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('time_project_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.time-projects.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/time-projects") || request()->is("admin/time-projects/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.timeProject.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('time_entry_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.time-entries.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/time-entries") || request()->is("admin/time-entries/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.timeEntry.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('time_report_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.time-reports.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/time-reports") || request()->is("admin/time-reports/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.timeReport.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('project_setting_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.project-settings.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/project-settings") || request()->is("admin/project-settings/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.projectSetting.title') }}
                            </a>
                        </li>
                    @endcan

                    @can('file_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.files.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/files") || request()->is("admin/files/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-copy c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.file.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        {{--        @dd(auth()->user()->id)--}}
        @canany(['task_management_access' , 'project_management_access'])
            {{--        @if(auth()->user()->can('task_management_access') || auth()->user()->can('project_management_access'))--}}
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.projectManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    {{--                    @can('task_status_access')--}}
                    {{--                        <li class="c-sidebar-nav-item">--}}
                    {{--                            <a href="{{ route("projectmanagement.admin.task-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/task-statuses") || request()->is("admin/projectmanagement/task-statuses/*") ? "active" : "" }}">--}}
                    {{--                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">--}}

                    {{--                                </i>--}}
                    {{--                                {{ trans('cruds.taskStatus.title') }}--}}
                    {{--                            </a>--}}
                    {{--                        </li>--}}
                    {{--                    @endcan--}}
                    @can('task_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("projectmanagement.admin.task-tags.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/task-tags") || request()->is("admin/projectmanagement/task-tags/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("projectmanagement.admin.tasks.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/tasks") || request()->is("admin/projectmanagement/tasks/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.task.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tasks_calendar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("projectmanagement.admin.tasks-calendars.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/tasks-calendars") || request()->is("admin/projectmanagement/tasks-calendars/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-calendar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tasksCalendar.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('project_access')
                        <li class="c-sidebar-nav-item">

                            <a href="{{ route("projectmanagement.admin.projects.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/projects") || request()->is("admin/projectmanagement/projects/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-folder-open c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.project.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('milestone_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("projectmanagement.admin.milestones.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/milestones") || request()->is("admin/projectmanagement/milestones/*") ? "active" : "" }}">
                                <i class="fa-fw fab fa-app-store c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.milestone.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('bug_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("projectmanagement.admin.bugs.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/bugs") || request()->is("admin/projectmanagement/bugs/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-bug c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.bug.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('ticket_access')
                        <li class="c-sidebar-nav-item">
                            {{--                            <a href="" class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/tickets") || request()->is("admin/projectmanagement/tickets/*") ? "active" : "" }}">--}}
                            <a href="{{ route("projectmanagement.admin.tickets.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/tickets") || request()->is("admin/projectmanagement/tickets/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-ticket-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.ticket.title') }}
                            </a>
                        </li>
                    @endcan
                    {{--                    @can('time_work_type_access')--}}
                    {{--                        <li class="c-sidebar-nav-item">--}}
                    {{--                            <a href="{{ route("projectmanagement.admin.time-work-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/time-work-types") || request()->is("admin/projectmanagement/time-work-types/*") ? "active" : "" }}">--}}
                    {{--                                <i class="fa-fw fas fa-th c-sidebar-nav-icon">--}}

                    {{--                                </i>--}}
                    {{--                                {{ trans('cruds.timeWorkType.title') }}--}}
                    {{--                            </a>--}}
                    {{--                        </li>--}}
                    {{--                    @endcan--}}
                    @can('work_tracking_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("projectmanagement.admin.work-trackings.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/work-trackings") || request()->is("admin/projectmanagement/work-trackings/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-stopwatch c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.workTracking.title') }}
                            </a>
                        </li>
                    @endcan
                    @canany(['project_report_access' , 'task_report_access' , 'bug_report_access' , 'ticket_report_access'])
                        <li class="c-sidebar-nav-dropdown">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw far fa-edit c-sidebar-nav-icon parent-dropdown">

                                </i>
                                {{ trans('global.reports') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('project_report_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("projectmanagement.admin.projects.project_report") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/projects/reports/project_report") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon sub-dropdown">

                                            </i>
                                            {{ trans('cruds.project.fields.project_report') }}
                                        </a>
                                    </li>
                                @endcan

                                @can('task_report_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("projectmanagement.admin.tasks.task_report") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/tasks/reports/task_report") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon sub-dropdown">

                                            </i>
                                            {{ trans('cruds.task.fields.task_report') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('bug_report_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("projectmanagement.admin.bugs.bug_report") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/bugs/reports/bug_report") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon sub-dropdown">

                                            </i>
                                            {{ trans('cruds.bug.fields.bug_report') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('ticket_report_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("projectmanagement.admin.tickets.ticket_report") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/tickets/reports/ticket_report") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon sub-dropdown">

                                            </i>
                                            {{ trans('cruds.ticket.fields.ticket_report') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcanany

                    @can('task_uploaded_file_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("projectmanagement.admin.task-uploaded-files.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/task-uploaded-files") || request()->is("admin/projectmanagement/task-uploaded-files/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-copy c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskUploadedFile.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_attachment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("projectmanagement.admin.task-attachments.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/projectmanagement/task-attachments") || request()->is("admin/projectmanagement/task-attachments/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-tasks c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskAttachment.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            {{--        @endif--}}
        @endcanany
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}"
                   class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        {{-- @can('sale_access') --}}
        <li class="c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.sale.title') }}
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                {{-- @can('proposal_access') --}}
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("sales.admin.proposals.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/proposals") || request()->is("admin/proposals/*") ? "active" : "" }}">
                        <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.proposal.title') }}
                    </a>
                </li>
                {{-- @endcan --}}
                @can('calls_access')

                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("sales.admin.calls.index") }}"
                           class="c-sidebar-nav-link {{ request()->is("sales/admin/calls") || request()->is("admin/calls/*") ? "active" : "" }}">
                            <i class="fa-fw fas fa-phone c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.calls.title') }}
                        </a>
                    </li>
                @endcan
                {{-- @can('lead_category_access') --}}
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("sales.admin.results.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/results") || request()->is("admin/results/*") ? "active" : "" }}">
                        <i class="fa-fw fas fa-align-center c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.Results.title') }}
                    </a>
                </li>
                {{-- @endcan --}}
                {{-- @can('lead_source_access') --}}
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("sales.admin.types.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/types") || request()->is("admin/types/*") ? "active" : "" }}">
                        <i class="fa-fw fab fa-soundcloud c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.Types.title') }}
                    </a>
                </li>
                {{-- @endcan --}}
                {{-- @can('lead_status_access') --}}
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("sales.admin.countries.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "active" : "" }}">
                        <i class="fa-fw fab fa-staylinked c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.Countries_Code.title') }}
                    </a>
                </li>
                {{-- @endcan --}}
                {{-- @can('salutation_access') --}}
                {{-- <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.salutations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/salutations") || request()->is("admin/salutations/*") ? "active" : "" }}">
                        <i class="fa-fw fab fa-safari c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.salutation.title') }}
                    </a>
                </li> --}}
                {{-- @endcan --}}
                {{-- @can('lead_access') --}}
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("sales.admin.leads.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/sales/leads") || request()->is("admin/leads/*") ? "active" : "" }}">
                        <i class="fa-fw fas fa-rocket c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.lead.title') }}
                    </a>
                </li>
                {{-- @endcan --}}
                {{-- @can('opportunity_access') --}}
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('sales.admin.opportunities.index') }}"
                       class="c-sidebar-nav-link {{ request()->is('admin/opportunities') || request()->is('admin/opportunities/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-filter c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.opportunity.title') }}
                    </a>
                </li>
                  {{--@endcan --}}
                {{--  @can('client_access') --}}
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.clients.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "active" : "" }}">
                        <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.client.title') }}
                    </a>
                </li>
                {{-- @endcan --}}
            </ul>
        </li>
        {{-- @endcan --}}
        @can('adminstration_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-ban c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.adminstration.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('announcement_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.announcements.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/announcements") || request()->is("admin/announcements/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-bullhorn c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.announcement.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('kb_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.kb-categories.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/kb-categories") || request()->is("admin/kb-categories/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-bezier-curve c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.kbCategory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        {{-- @can('materials_supplier_access') --}}
        <li class="c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fab fa-stripe-s c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.materialsSupplier.title') }}
            </a>
            <ul class="c-sidebar-nav-dropdown-items">

                {{-- @can('proposals_item_access') --}}
                <li class="c-sidebar-nav-dropdown">
                    <a class="c-sidebar-nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-cube c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.proposalsItem.title') }}
                    </a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("sales.admin.proposals-items.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/proposals-items") || request()->is("admin/proposals-items/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-cube c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.proposalsItem.title') }}
                            </a>
                        </li>
                        {{-- @can('customer_group_access') --}}
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("materialssuppliers.admin.customer-groups.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("materialssuppliers/admin/customer-groups") || request()->is("materialssuppliers/admin/customer-groups/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-th c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.customerGroup.title') }}
                            </a>
                        </li>
                        {{-- @endcan --}}
                    </ul>
                </li>

                {{-- @endcan
                @can('supplier_access') --}}
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("materialssuppliers.admin.suppliers.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("materialssuppliers/admin/suppliers") || request()->is("materialssuppliers/admin/suppliers/*") ? "active" : "" }}">
                        <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.supplier.title') }}
                    </a>
                </li>
                {{-- @endcan --}}
                @can('purchase_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("materialssuppliers.admin.purchases.index") }}"
                           class="c-sidebar-nav-link {{ request()->is("admin/purchases") || request()->is("admin/purchases/*") ? "active" : "" }}">
                            <i class="fa-fw fas fa-shopping-bag c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.purchase.title') }}
                        </a>
                    </li>
                @endcan
                {{-- @can('tax_rate_access') --}}
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("materialssuppliers.admin.tax-rates.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("materialssuppliers/admin/tax-rates") || request()->is("materialssuppliers/admin/tax-rates/*") ? "active" : "" }}">
                        <i class="fa-fw far fa-circle c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.taxRate.title') }}
                    </a>
                </li>
                {{-- @endcan --}}
                @can('return_stock_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("admin.return-stocks.index") }}"
                           class="c-sidebar-nav-link {{ request()->is("admin/return-stocks") || request()->is("admin/return-stocks/*") ? "active" : "" }}">
                            <i class="fa-fw fas fa-share-square c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.returnStock.title') }}
                        </a>
                    </li>
                @endcan
                @can('purchase_payment_access')
                    <li class="c-sidebar-nav-item">
                        <a href="{{ route("materialssuppliers.admin.purchase-payments.index") }}"
                           class="c-sidebar-nav-link {{ request()->is("materialssuppliers/admin/purchase-payments") || request()->is("materialssuppliers/admin/purchase-payments/*") ? "active" : "" }}">
                            <i class="fa-fw far fa-credit-card c-sidebar-nav-icon">

                            </i>
                            {{ trans('cruds.purchasePayment.title') }}
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
        {{-- @endcan --}}
        @can('finance_access')
            <li class="c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-building c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.finance.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('invoice_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.invoices.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/invoices") || request()->is("admin/invoices/*") ? "active" : "" }}">
                                <i class="fa-fw far fa-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.invoice.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('payment_method_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payment-methods.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/payment-methods") || request()->is("admin/payment-methods/*") ? "active" : "" }}">
                                <i class="fa-fw fab fa-paypal c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.paymentMethod.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('payment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.payments.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "active" : "" }}">
                                <i class="fa-fw far fa-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.payment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('transaction_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.transactions.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/transactions") || request()->is("admin/transactions/*") ? "active" : "" }}">
                                <i class="fa-fw far fa-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.transaction.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('transfer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.transfers.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/transfers") || request()->is("admin/transfers/*") ? "active" : "" }}">
                                <i class="fa-fw far fa-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.transfer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('employee_bank_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("hr.admin.employee-banks.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/employee-banks") || request()->is("admin/employee-banks/*") ? "active" : "" }}">
                                <i class="fa-fw fas fa-university c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.employeeBank.title') }}
                            </a>
                        </li>
                    @endcan

                    @can('office_asset_access')
                        <li class="c-sidebar-nav-dropdown">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-cubes c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.officeAsset.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('stock_category_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.stock-categories.index") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/stock-categories") || request()->is("admin/stock-categories/*") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-sliders-h c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.stockCategory.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('stock_sub_category_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.stock-sub-categories.index") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/stock-sub-categories") || request()->is("admin/stock-sub-categories/*") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-shekel-sign c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.stockSubCategory.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('stock_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.stocks.index") }}"
                                           class="c-sidebar-nav-link {{ request()->is("admin/stocks") || request()->is("admin/stocks/*") ? "active" : "" }}">
                                            <i class="fa-fw fas fa-align-center c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.stock.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                    @can('online_payment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.online-payments.index") }}"
                               class="c-sidebar-nav-link {{ request()->is("admin/online-payments") || request()->is("admin/online-payments/*") ? "active" : "" }}">
                                <i class="fa-fw far fa-circle c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.onlinePayment.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('setting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.settings.index") }}"
                   class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "active" : "" }}">
                    <i class="fa-fw fas fa-users-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>


            @can('local_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ url("translations") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/locals") || request()->is("admin/locals/*") ? "active" : "" }}">
                        <i class="fa-fw fas fa-globe c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.local.title') }}
                    </a>
                </li>

                @endcan
                </li>


            @endcan




            @can('private_chat_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.private-chats.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/private-chats") || request()->is("admin/private-chats/*") ? "active" : "" }}">
                        <i class="fa-fw fas fa-comments c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.privateChat.title') }}
                    </a>
                </li>
            @endcan
            @can('todo_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.todos.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/todos") || request()->is("admin/todos/*") ? "active" : "" }}">
                        <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.todo.title') }}
                    </a>
                </li>
            @endcan
            @can('outgoing_email_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route("admin.outgoing-emails.index") }}"
                       class="c-sidebar-nav-link {{ request()->is("admin/outgoing-emails") || request()->is("admin/outgoing-emails/*") ? "active" : "" }}">
                        <i class="fa-fw fas fa-at c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.outgoingEmail.title') }}
                    </a>
                </li>
            @endcan
            @can('expense_management_access')
                <li class="c-sidebar-nav-dropdown">
                    <a class="c-sidebar-nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-money-bill c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.expenseManagement.title') }}
                    </a>
                    <ul class="c-sidebar-nav-dropdown-items">
                        @can('expense_category_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.expense-categories.index") }}"
                                   class="c-sidebar-nav-link {{ request()->is("admin/expense-categories") || request()->is("admin/expense-categories/*") ? "active" : "" }}">
                                    <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.expenseCategory.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('income_category_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.income-categories.index") }}"
                                   class="c-sidebar-nav-link {{ request()->is("admin/income-categories") || request()->is("admin/income-categories/*") ? "active" : "" }}">
                                    <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.incomeCategory.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('expense_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.expenses.index") }}"
                                   class="c-sidebar-nav-link {{ request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "active" : "" }}">
                                    <i class="fa-fw fas fa-arrow-circle-right c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.expense.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('income_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.incomes.index") }}"
                                   class="c-sidebar-nav-link {{ request()->is("admin/incomes") || request()->is("admin/incomes/*") ? "active" : "" }}">
                                    <i class="fa-fw fas fa-arrow-circle-right c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.income.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('expense_report_access')
                            <li class="c-sidebar-nav-item">
                                <a href="{{ route("admin.expense-reports.index") }}"
                                   class="c-sidebar-nav-link {{ request()->is("admin/expense-reports") || request()->is("admin/expense-reports/*") ? "active" : "" }}">
                                    <i class="fa-fw fas fa-chart-line c-sidebar-nav-icon">

                                    </i>
                                    {{ trans('cruds.expenseReport.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.systemCalendar") }}"
                   class="c-sidebar-nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                    <i class="c-sidebar-nav-icon fa-fw fas fa-calendar">

                    </i>
                    {{ trans('global.systemCalendar') }}
                </a>
            </li>
            @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}"
                   class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            {{-- @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif --}}
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link"
                   onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>
