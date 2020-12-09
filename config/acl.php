<?php
    return [

        'permissionsActive' => env('PERMISSIONS_ACTIVE'),

        'group-permissions' => [

            // admins
            'user_managements' => [
                'user_management_access',
                'permission_create',
                'permission_edit',
                'permission_show',
                'permission_delete',
                'permission_access',
                'role_create',
                'role_edit',
                'role_show',
                'role_delete',
                'role_access',
                'user_create',
                'user_edit',
                'user_show',
                'user_delete',
                'user_access',
            ],

            // show modules
            // 'modules' => [
            //     'show-module-dashboard', // done
            //     'show-module-hr', // done
            //     'show-module-crm', // done
            //     'show-module-accounting', // done
            //     'show-module-projects-management', // done
            //     'show-module-designs', // done
            //     'show-module-marketing', // done
            //     'show-module-documents', // done
            //     'show-module-notes', // done
            //     'show-module-cp-website', // done
            //     'show-module-web-development', // done
            //     'show-module-calendar', // done
            //     'show-module-settings', // done
            // ],

            // reports
            'crm' => [
                'basic_c_r_m_access',
                'crm_status_create', // done
                'crm_status_delete', // done
                'crm_status_access', // done
                'crm_customer_create',
                'crm_customer_edit',
                'crm_customer_show',
                'crm_customer_delete',
                'crm_customer_access',
                'crm_note_create',
                'crm_note_edit',
                'crm_note_show',
                'crm_note_delete',
                'crm_note_access',
                'crm_document_create',
                'crm_document_edit',
                'crm_document_show',
                'crm_document_delete',
                'crm_document_access',
            ],

            // 'settings' => [
            //     'index-general-settings', // done
            //     'edit-general-settings', // done
            //     'edit-lead-statuses', // done
            //     'edit-sales-commissions' // done
            // ],


            // permissions
            // 'permissions' => [
            //     'index-roles', // done
            //     'edit-roles', // done
            //     'create-roles', // done
            //     'delete-roles' // done
            // ],


            // hr
            'hr' => [
                'hr_access', // done
                'employee_create', // done
                'employee_edit', // done
                'employee_show', // done
                'employee_delete', // done
                'employee_access', // done
            ],

            'time_management' => [
                'time_management_access',
                'time_work_type_create',
                'time_work_type_edit',
                'time_work_type_show',
                'time_work_type_delete',
                'time_work_type_access',
                'time_project_create',
                'time_project_edit',
                'time_project_show',
                'time_project_delete',
                'time_project_access',
                'time_entry_create',
                'time_entry_edit',
                'time_entry_show',
                'time_entry_delete',
                'time_entry_access',
                'time_report_create',
                'time_report_edit',
                'time_report_show',
                'time_report_delete',
                'time_report_access',
            ],

            'task_management' => [
                'task_management_access',
                'task_status_create',
                'task_status_edit',
                'task_status_show',
                'task_status_delete',
                'task_status_access',
                'task_tag_create',
                'task_tag_edit',
                'task_tag_show',
                'task_tag_delete',
                'task_tag_access',
                'task_create',
                'task_edit',
                'task_show',
                'task_delete',
                'task_access',
                'tasks_calendar_access',
            ],

            'user_alerts' => [
                'user_alert_create',
                'user_alert_show',
                'user_alert_delete',
                'user_alert_access',
            ],

            'departments' => [
                'department_create', // done
                'department_edit', // done
                'department_show', // done
                'department_delete', // done
                'department_access', // done
                'force-delete-departments', // done
            ],

            'designations' => [
                'designation_create', // done
                'designation_edit', // done
                'designation_show', // done
                'designation_delete', // done
                'designation_access', // done
            ],

            'users' => [
                'account_detail_create', // done
                'account_detail_edit', // done
                'account_detail_show', // done
                'account_detail_delete', // done
                'account_detail_access', // done
                'employee_award_create',
                'employee_award_edit',
                'employee_award_show',
                'employee_award_delete',
                'employee_award_access',
                'employees_access',
            ],

            'requests' => [
                'overtime_create',
                'overtime_edit',
                'overtime_show',
                'overtime_delete',
                'overtime_access',
                'holiday_create',
                'holiday_edit',
                'holiday_show',
                'holiday_delete',
                'holiday_access',
                'training_create',
                'training_edit',
                'training_show',
                'training_delete',
                'training_access',
                'employee_request_create',
                'employee_request_edit',
                'employee_request_show',
                'employee_request_delete',
                'employee_request_access',
            ],

            'leaves' => [
                'leave_category_create',
                'leave_category_edit',
                'leave_category_show',
                'leave_category_delete',
                'leave_category_access',
                'leave_application_create',
                'leave_application_edit',
                'leave_application_show',
                'leave_application_delete',
                'leave_application_access',
            ],

            'attendances' => [
                'attendances_create',
                'attendances_edit',
                'attendances_show',
                'attendances_delete',
                'attendances_access',
                'daily_attendance_create',
                'daily_attendance_edit',
                'daily_attendance_show',
                'daily_attendance_delete',
                'daily_attendance_access',
                'monthly_attendance_show',
                'monthly_attendance_access',
            ],

            'jobs' => [
                'recruitment_access',
                'job_circular_create',
                'job_circular_edit',
                'job_circular_show',
                'job_circular_delete',
                'job_circular_access',
                'job_application_create',
                'job_application_edit',
                'job_application_show',
                'job_application_delete',
                'job_application_access',
            ],

            'proposals' => [
                'proposal_create',
                'proposal_edit',
                'proposal_show',
                'proposal_delete',
                'proposal_access',
                'interested_in_create',
                'interested_in_delete',
                'interested_in_access',
            ],

            'opportunity' => [
                'opportunity_create',
                'opportunity_edit',
                'opportunity_show',
                'opportunity_delete',
                'opportunity_access',
            ],

            'work_tracking' => [
                'work_tracking_create',
                'work_tracking_edit',
                'work_tracking_show',
                'work_tracking_delete',
                'work_tracking_access',
            ],

            'milestones' => [
                'milestone_create',
                'milestone_edit',
                'milestone_show',
                'milestone_delete',
                'milestone_access',
                'milestone_assign_to',
            ],

            'bugs' => [
                'bug_create',
                'bug_edit',
                'bug_show',
                'bug_delete',
                'bug_access',
            ],

            'tickets' => [
                'ticket_create',
                'ticket_edit',
                'ticket_show',
                'ticket_delete',
                'ticket_access',
            ],

            'payroll' => [
                'payroll_access',
                'salary_template_show',
                'salary_template_edit',
                'salary_template_create',
                'salary_template_delete',
                'salary_template_access',
                'salary_deduction_create',
                'salary_deduction_delete',
                'salary_deduction_access',
                'salary_payment_create',
                'salary_payment_edit',
                'salary_payment_show',
                'salary_payment_delete',
                'salary_payment_access',
                'salary_payment_detail_create',
                'salary_payment_detail_delete',
                'salary_payment_detail_access',
                'salary_payslip_create',
                'salary_payslip_edit',
                'salary_payslip_show',
                'salary_payslip_delete',
                'salary_payslip_access',
                'hourly_rate_create',
                'hourly_rate_delete',
                'hourly_rate_access',
                'online_payment_create',
                'online_payment_delete',
                'online_payment_access',
                'salary_template_show',
                'salary_template_edit',
                'salary_payment_detail_show',
                'payroll_summary',
                'advance_salary_create',
            ],

            'vacations' => [
                'vacation_create',
                'vacation_edit',
                'vacation_show',
                'vacation_delete',
                'vacation_access',
            ],

            'set_time' => [
                'set_time_create',
                'set_time_edit',
                'set_time_show',
                'set_time_delete',
                'set_time_access',
            ],

            '' => [
                '',
            ],

            '' => [
                '',
            ],
            // crm
            'leads' => [
                'countries_create', // done
                'countries_edit', // done
                'countries_show', // done
                'countries_delete', // done
                // 'lead_category_access', // done
                // 'lead_source_create', // done
                // 'lead_source_delete', // done
                // 'lead_source_access',
                // 'lead_status_create',
                // 'lead_status_delete',
                // 'lead_status_access',
                // 'salutation_create',
                // 'salutation_delete',
                // 'salutation_access',
                'lead_create',
                'lead_edit',
                'lead_show',
                'lead_delete',
                'lead_access',
            ],

            'clients' => [
                'client_create', // done
                'client_edit', // done
                'client_show', // done
                'client_delete', // done
                'client_access', // done
                'client_menu_create', // done
                'client_menu_edit', // done
                'client_menu_show',
                'client_menu_delete',
                'client_menu_access',
            ],

            'meetings' => [
                'meeting_minute_create', // done
                'meeting_minute_edit', // done
                'meeting_minute_show', // done
                'meeting_minute_delete', // done
                'meeting_minute_access', // done
                // 'restore-meetings', // done
                // 'force-delete-meetings', // done
            ],

            // 'services' => [
            //     'index-services', // done
            //     'create-services', // done
            //     'edit-services', // done
            //     'delete-services', // done
            //     'restore-services', // done
            //     'force-delete-services', // done
            // ],

            // projects management
            'projects' => [
                'project_management_access', // done
                'project_create', // done
                'project_edit', // done
                'project_show', // done
                'project_delete', // done
                'project_access', // done
                'project_setting_create', // done
                'project_setting_delete',
                'project_setting_access',
                'project_assign_to',
            ],


            // accounting
            // 'banks' => [
            //     'account_create',
            //     'account_edit',
            //     'account_show',
            //     'account_delete',
            //     'account_access',
            //     'force-delete-banks',
            // ],

            // 'cashs' => [
            //     'index-cashs',
            //     'create-cashs',
            //     'edit-cashs',
            //     'profile-cashs',
            //     'delete-cashs',
            //     'restore-cashs',
            //     'force-delete-cashs',
            // ],

            // 'partners' => [
            //     'index-partners',
            //     'create-partners',
            //     'edit-partners',
            //     'profile-partners',
            //     'delete-partners',
            //     'restore-partners',
            //     'force-delete-partners',
            // ],

            // 'payments' => [
            //     'index-account-payments',
            //     'create-payments',
            //     'edit-payments',
            //     'delete-payments',
            //     'restore-payments',
            //     'force-delete-payments',
            // ],

            // 'sales' => [
            //     'sale_access'
            // ],

            // 'sales_returns' => [
            //     'index-sales_returns'
            // ],

            // 'purchases' => [
            //     'index-purchases'
            // ],

            // 'purchase_returns' => [
            //     'index-purchase_returns'
            // ],

            // 'suppliers' => [
            //     'index-suppliers',
            //     'create-suppliers',
            //     'edit-suppliers',
            //     'profile-suppliers',
            //     'delete-suppliers',
            //     'restore-suppliers',
            //     'force-delete-suppliers',
            // ],

            // 'expenses' => [
            //     'index-expenses',
            //     'create-expenses',
            //     'edit-expenses',
            //     'delete-expenses',
            // ],

            // 'fixed_assets' => [
            //     'index-fixed_assets',
            //     'create-fixed_assets',
            //     'edit-fixed_assets',
            //     'delete-fixed_assets',
            // ],

            // 'purchase_orders' => [
            //     'index-purchase_orders',
            //     'create-purchase_orders',
            //     'edit-purchase_orders',
            //     'profile-purchase_orders',
            //     'delete-purchase_orders',
            // ],

            // 'todos' => [
            //     'index-todos'
            // ],
        ]

    ];
