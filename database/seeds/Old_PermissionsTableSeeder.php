<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class Old_PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'title' => 'user_management_access',
            ],
            [
                'title' => 'permission_create',
            ],
            [
                'title' => 'permission_edit',
            ],
            [
                'title' => 'permission_show',
            ],
            [
                'title' => 'permission_delete',
            ],
            [
                'title' => 'permission_access',
            ],
            [
                'title' => 'role_create',
            ],
            [
                'title' => 'role_edit',
            ],
            [
                'title' => 'role_show',
            ],
            [
                'title' => 'role_delete',
            ],
            [
                'title' => 'role_access',
            ],
            [
                'title' => 'user_create',
            ],
            [
                'title' => 'user_edit',
            ],
            [
                'title' => 'user_show',
            ],
            [
                'title' => 'user_delete',
            ],
            [
                'title' => 'user_access',
            ],
            [
                'title' => 'basic_c_r_m_access',
            ],
            [
                'title' => 'crm_status_create',
            ],
            [
                'title' => 'crm_status_delete',
            ],
            [
                'title' => 'crm_status_access',
            ],
            [
                'title' => 'crm_customer_create',
            ],
            [
                'title' => 'crm_customer_edit',
            ],
            [
                'title' => 'crm_customer_show',
            ],
            [
                'title' => 'crm_customer_delete',
            ],
            [
                'title' => 'crm_customer_access',
            ],
            [
                'title' => 'crm_note_create',
            ],
            [
                'title' => 'crm_note_edit',
            ],
            [
                'title' => 'crm_note_show',
            ],
            [
                'title' => 'crm_note_delete',
            ],
            [
                'title' => 'crm_note_access',
            ],
            [
                'title' => 'crm_document_create',
            ],
            [
                'title' => 'crm_document_edit',
            ],
            [
                'title' => 'crm_document_show',
            ],
            [
                'title' => 'crm_document_delete',
            ],
            [
                'title' => 'crm_document_access',
            ],
            [
                'title' => 'hr_access',
            ],
            [
                'title' => 'employee_create',
            ],
            [
                'title' => 'employee_edit',
            ],
            [
                'title' => 'employee_show',
            ],
            [
                'title' => 'employee_delete',
            ],
            [
                'title' => 'employee_access',
            ],
            [
                'title' => 'time_management_access',
            ],
            [
                'title' => 'time_work_type_create',
            ],
            [
                'title' => 'time_work_type_edit',
            ],
            [
                'title' => 'time_work_type_show',
            ],
            [
                'title' => 'time_work_type_delete',
            ],
            [
                'title' => 'time_work_type_access',
            ],
            [
                'title' => 'time_project_create',
            ],
            [
                'title' => 'time_project_edit',
            ],
            [
                'title' => 'time_project_show',
            ],
            [
                'title' => 'time_project_delete',
            ],
            [
                'title' => 'time_project_access',
            ],
            [
                'title' => 'time_entry_create',
            ],
            [
                'title' => 'time_entry_edit',
            ],
            [
                'title' => 'time_entry_show',
            ],
            [
                'title' => 'time_entry_delete',
            ],
            [
                'title' => 'time_entry_access',
            ],
            [
                'title' => 'time_report_create',
            ],
            [
                'title' => 'time_report_edit',
            ],
            [
                'title' => 'time_report_show',
            ],
            [
                'title' => 'time_report_delete',
            ],
            [
                'title' => 'time_report_access',
            ],
            [
                'title' => 'task_management_access',
            ],
            [
                'title' => 'task_status_create',
            ],
            [
                'title' => 'task_status_edit',
            ],
            [
                'title' => 'task_status_show',
            ],
            [
                'title' => 'task_status_delete',
            ],
            [
                'title' => 'task_status_access',
            ],
            [
                'title' => 'task_tag_create',
            ],
            [
                'title' => 'task_tag_edit',
            ],
            [
                'title' => 'task_tag_show',
            ],
            [
                'title' => 'task_tag_delete',
            ],
            [
                'title' => 'task_tag_access',
            ],
            [
                'title' => 'task_create',
            ],
            [
                'title' => 'task_edit',
            ],
            [
                'title' => 'task_show',
            ],
            [
                'title' => 'task_delete',
            ],
            [
                'title' => 'task_access',
            ],
            [
                'title' => 'tasks_calendar_access',
            ],
            [
                'title' => 'user_alert_create',
            ],
            [
                'title' => 'user_alert_show',
            ],
            [
                'title' => 'user_alert_delete',
            ],
            [
                'title' => 'user_alert_access',
            ],
            [
                'title' => 'department_create',
            ],
            [
                'title' => 'department_edit',
            ],
            [
                'title' => 'department_show',
            ],
            [
                'title' => 'department_delete',
            ],
            [
                'title' => 'department_access',
            ],
            [
                'title' => 'designation_create',
            ],
            [
                'title' => 'designation_edit',
            ],
            [
                'title' => 'designation_show',
            ],
            [
                'title' => 'designation_delete',
            ],
            [
                'title' => 'designation_access',
            ],
            [
                'title' => 'account_detail_create',
            ],
            [
                'title' => 'account_detail_edit',
            ],
            [
                'title' => 'account_detail_show',
            ],
            [
                'title' => 'account_detail_delete',
            ],
            [
                'title' => 'account_detail_access',
            ],
            [
                'title' => 'overtime_create',
            ],
            [
                'title' => 'overtime_edit',
            ],
            [
                'title' => 'overtime_show',
            ],
            [
                'title' => 'overtime_delete',
            ],
            [
                'title' => 'overtime_access',
            ],
            [
                'title' => 'holiday_create',
            ],
            [
                'title' => 'holiday_edit',
            ],
            [
                'title' => 'holiday_show',
            ],
            [
                'title' => 'holiday_delete',
            ],
            [
                'title' => 'holiday_access',
            ],
            [
                'title' => 'training_create',
            ],
            [
                'title' => 'training_edit',
            ],
            [
                'title' => 'training_show',
            ],
            [
                'title' => 'training_delete',
            ],
            [
                'title' => 'training_access',
            ],
            [
                'title' => 'leave_category_create',
            ],
            [
                'title' => 'leave_category_edit',
            ],
            [
                'title' => 'leave_category_show',
            ],
            [
                'title' => 'leave_category_delete',
            ],
            [
                'title' => 'leave_category_access',
            ],
            [
                'title' => 'leave_application_create',
            ],
            [
                'title' => 'leave_application_edit',
            ],
            [
                'title' => 'leave_application_show',
            ],
            [
                'title' => 'leave_application_delete',
            ],
            [
                'title' => 'leave_application_access',
            ],
            [
                'title' => 'meeting_minute_create',
            ],
            [
                'title' => 'meeting_minute_edit',
            ],
            [
                'title' => 'meeting_minute_show',
            ],
            [
                'title' => 'meeting_minute_delete',
            ],
            [
                'title' => 'meeting_minute_access',
            ],
            [
                'title' => 'employee_award_create',
            ],
            [
                'title' => 'employee_award_edit',
            ],
            [
                'title' => 'employee_award_show',
            ],
            [
                'title' => 'employee_award_delete',
            ],
            [
                'title' => 'employee_award_access',
            ],
            // [
            //     'title' => 'attendances_access',
            // ],
            [
                'title' => 'attendances_create',
            ],
            [
                'title' => 'attendances_edit',
            ],
            [
                'title' => 'attendances_show',
            ],
            [
                'title' => 'attendances_delete',
            ],
            [
                'title' => 'attendances_access',
            ],
            [
                'title' => 'employees_access',
            ],
            [
                'title' => 'daily_attendance_create',
            ],
            [
                'title' => 'daily_attendance_edit',
            ],
            [
                'title' => 'daily_attendance_show',
            ],
            [
                'title' => 'daily_attendance_delete',
            ],
            [
                'title' => 'daily_attendance_access',
            ],
            [
                'title' => 'monthly_attendance_show',
            ],
            [
                'title' => 'monthly_attendance_access',
            ],
            [
                'title' => 'recruitment_access',
            ],
            [
                'title' => 'job_circular_create',
            ],
            [
                'title' => 'job_circular_edit',
            ],
            [
                'title' => 'job_circular_show',
            ],
            [
                'title' => 'job_circular_delete',
            ],
            [
                'title' => 'job_circular_access',
            ],
            [
                'title' => 'job_application_create',
            ],
            [
                'title' => 'job_application_edit',
            ],
            [
                'title' => 'job_application_show',
            ],
            [
                'title' => 'job_application_delete',
            ],
            [
                'title' => 'job_application_access',
            ],
            [
                'title' => 'project_management_access',
            ],
            [
                'title' => 'sale_access',
            ],
            [
                'title' => 'proposal_create',
            ],
            [
                'title' => 'proposal_edit',
            ],
            [
                'title' => 'proposal_show',
            ],
            [
                'title' => 'proposal_delete',
            ],
            [
                'title' => 'proposal_access',
            ],
            [
                'title' => 'interested_in_create',
            ],
            [
                'title' => 'interested_in_delete',
            ],
            [
                'title' => 'interested_in_access',
            ],
            [
                'title' => 'lead_category_create',
            ],
            [
                'title' => 'lead_category_edit',
            ],
            [
                'title' => 'lead_category_show',
            ],
            [
                'title' => 'lead_category_delete',
            ],
            [
                'title' => 'lead_category_access',
            ],
            [
                'title' => 'lead_source_create',
            ],
            [
                'title' => 'lead_source_delete',
            ],
            [
                'title' => 'lead_source_access',
            ],
            [
                'title' => 'lead_status_create',
            ],
            [
                'title' => 'lead_status_delete',
            ],
            [
                'title' => 'lead_status_access',
            ],
            [
                'title' => 'salutation_create',
            ],
            [
                'title' => 'salutation_delete',
            ],
            [
                'title' => 'salutation_access',
            ],
            [
                'title' => 'lead_create',
            ],
            [
                'title' => 'lead_edit',
            ],
            [
                'title' => 'lead_show',
            ],
            [
                'title' => 'lead_delete',
            ],
            [
                'title' => 'lead_access',
            ],
            [
                'title' => 'opportunity_create',
            ],
            [
                'title' => 'opportunity_edit',
            ],
            [
                'title' => 'opportunity_show',
            ],
            [
                'title' => 'opportunity_delete',
            ],
            [
                'title' => 'opportunity_access',
            ],
            [
                'title' => 'client_create',
            ],
            [
                'title' => 'client_edit',
            ],
            [
                'title' => 'client_show',
            ],
            [
                'title' => 'client_delete',
            ],
            [
                'title' => 'client_access',
            ],
            [
                'title' => 'client_menu_create',
            ],
            [
                'title' => 'client_menu_edit',
            ],
            [
                'title' => 'client_menu_show',
            ],
            [
                'title' => 'client_menu_delete',
            ],
            [
                'title' => 'client_menu_access',
            ],
            [
                'title' => 'menu_create',
            ],
            [
                'title' => 'menu_edit',
            ],
            [
                'title' => 'menu_show',
            ],
            [
                'title' => 'menu_delete',
            ],
            [
                'title' => 'menu_access',
            ],
            [
                'title' => 'project_create',
            ],
            [
                'title' => 'project_edit',
            ],
            [
                'title' => 'project_show',
            ],
            [
                'title' => 'project_delete',
            ],
            [
                'title' => 'project_access',
            ],
            [
                'title' => 'project_setting_create',
            ],
            [
                'title' => 'project_setting_delete',
            ],
            [
                'title' => 'project_setting_access',
            ],
            [
                'title' => 'work_tracking_create',
            ],
            [
                'title' => 'work_tracking_edit',
            ],
            [
                'title' => 'work_tracking_show',
            ],
            [
                'title' => 'work_tracking_delete',
            ],
            [
                'title' => 'work_tracking_access',
            ],
            [
                'title' => 'account_create',
            ],
            [
                'title' => 'account_edit',
            ],
            [
                'title' => 'account_show',
            ],
            [
                'title' => 'account_delete',
            ],
            [
                'title' => 'account_access',
            ],
            [
                'title' => 'milestone_create',
            ],
            [
                'title' => 'milestone_edit',
            ],
            [
                'title' => 'milestone_show',
            ],
            [
                'title' => 'milestone_delete',
            ],
            [
                'title' => 'milestone_access',
            ],
            [
                'title' => 'bug_create',
            ],
            [
                'title' => 'bug_edit',
            ],
            [
                'title' => 'bug_show',
            ],
            [
                'title' => 'bug_delete',
            ],
            [
                'title' => 'bug_access',
            ],
            [
                'title' => 'ticket_create',
            ],
            [
                'title' => 'ticket_edit',
            ],
            [
                'title' => 'ticket_show',
            ],
            [
                'title' => 'ticket_delete',
            ],
            [
                'title' => 'ticket_access',
            ],
            ///////////////////////////////////////////
            ///////////////////////////////////////////
            [
                'title' => 'adminstration_access',
            ],
            [
                'title' => 'announcement_create',
            ],
            [
                'title' => 'announcement_edit',
            ],
            [
                'title' => 'announcement_show',
            ],
            [
                'title' => 'announcement_delete',
            ],
            [
                'title' => 'announcement_access',
            ],
            [
                'title' => 'kb_category_create',
            ],
            [
                'title' => 'kb_category_delete',
            ],
            [
                'title' => 'kb_category_access',
            ],
            [
                'title' => 'materials_supplier_access',
            ],
            [
                'title' => 'customer_group_create',
            ],
            [
                'title' => 'customer_group_edit',
            ],
            [
                'title' => 'customer_group_show',
            ],
            [
                'title' => 'customer_group_delete',
            ],
            [
                'title' => 'customer_group_access',
            ],
            [
                'title' => 'finance_access',
            ],
            [
                'title' => 'invoice_create',
            ],
            [
                'title' => 'invoice_edit',
            ],
            [
                'title' => 'invoice_show',
            ],
            [
                'title' => 'invoice_delete',
            ],
            [
                'title' => 'invoice_access',
            ],
            [
                'title' => 'proposals_item_create',
            ],
            [
                'title' => 'proposals_item_edit',
            ],
            [
                'title' => 'proposals_item_show',
            ],
            [
                'title' => 'proposals_item_delete',
            ],
            [
                'title' => 'proposals_item_access',
            ],
            [
                'title' => 'supplier_create',
            ],
            [
                'title' => 'supplier_edit',
            ],
            [
                'title' => 'supplier_show',
            ],
            [
                'title' => 'supplier_delete',
            ],
            [
                'title' => 'supplier_access',
            ],
            [
                'title' => 'purchase_create',
            ],
            [
                'title' => 'purchase_edit',
            ],
            [
                'title' => 'purchase_show',
            ],
            [
                'title' => 'purchase_delete',
            ],
            [
                'title' => 'purchase_access',
            ],
            [
                'title' => 'return_stock_create',
            ],
            [
                'title' => 'return_stock_edit',
            ],
            [
                'title' => 'return_stock_show',
            ],
            [
                'title' => 'return_stock_delete',
            ],
            [
                'title' => 'return_stock_access',
            ],
            [
                'title' => 'purchase_payment_create',
            ],
            [
                'title' => 'purchase_payment_edit',
            ],
            [
                'title' => 'purchase_payment_show',
            ],
            [
                'title' => 'purchase_payment_delete',
            ],
            [
                'title' => 'purchase_payment_access',
            ],
            [
                'title' => 'payment_method_create',
            ],
            [
                'title' => 'payment_method_delete',
            ],
            [
                'title' => 'payment_method_access',
            ],
            [
                'title' => 'payment_create',
            ],
            [
                'title' => 'payment_edit',
            ],
            [
                'title' => 'payment_show',
            ],
            [
                'title' => 'payment_delete',
            ],
            [
                'title' => 'payment_access',
            ],
            [
                'title' => 'transaction_create',
            ],
            [
                'title' => 'transaction_edit',
            ],
            [
                'title' => 'transaction_show',
            ],
            [
                'title' => 'transaction_delete',
            ],
            [
                'title' => 'transaction_access',
            ],
            [
                'title' => 'transfer_create',
            ],
            [
                'title' => 'transfer_edit',
            ],
            [
                'title' => 'transfer_show',
            ],
            [
                'title' => 'transfer_delete',
            ],
            [
                'title' => 'transfer_access',
            ],
            [
                'title' => 'employee_bank_create',
            ],
            [
                'title' => 'employee_bank_edit',
            ],
            [
                'title' => 'employee_bank_show',
            ],
            [
                'title' => 'employee_bank_delete',
            ],
            [
                'title' => 'employee_bank_access',
            ],
            [
                'title' => 'tax_rate_create',
            ],
            [
                'title' => 'tax_rate_edit',
            ],
            [
                'title' => 'tax_rate_show',
            ],
            [
                'title' => 'tax_rate_delete',
            ],
            [
                'title' => 'tax_rate_access',
            ],
            [
                'title' => 'office_asset_access',
            ],
            [
                'title' => 'stock_category_create',
            ],
            [
                'title' => 'stock_category_delete',
            ],
            [
                'title' => 'stock_category_access',
            ],
            [
                'title' => 'stock_sub_category_create',
            ],
            [
                'title' => 'stock_sub_category_delete',
            ],
            [
                'title' => 'stock_sub_category_access',
            ],
            [
                'title' => 'stock_create',
            ],
            [
                'title' => 'stock_edit',
            ],
            [
                'title' => 'stock_delete',
            ],
            [
                'title' => 'stock_access',
            ],
            [
                'title' => 'payroll_access',
            ],
            [
                'title' => 'advance_salary_create',
            ],
            [
                'title' => 'advance_salary_edit',
            ],
            [
                'title' => 'advance_salary_show',
            ],
            [
                'title' => 'advance_salary_delete',
            ],
            [
                'title' => 'advance_salary_access',
            ],
            [
                'title' => 'salary_allowance_create',
            ],
            [
                'title' => 'salary_allowance_delete',
            ],
            [
                'title' => 'salary_allowance_access',
            ],
            [
                'title' => 'salary_template_show',
            ],
            [
                'title' => 'salary_template_edit',
            ],
            [
                'title' => 'salary_template_create',
            ],
            [
                'title' => 'salary_template_delete',
            ],
            [
                'title' => 'salary_template_access',
            ],
            [
                'title' => 'salary_deduction_create',
            ],
            [
                'title' => 'salary_deduction_delete',
            ],
            [
                'title' => 'salary_deduction_access',
            ],
            [
                'title' => 'salary_payment_create',
            ],
            [
                'title' => 'salary_payment_edit',
            ],
            [
                'title' => 'salary_payment_show',
            ],
            [
                'title' => 'salary_payment_delete',
            ],
            [
                'title' => 'salary_payment_access',
            ],
            [
                'title' => 'salary_payment_allowance_create',
            ],
            [
                'title' => 'salary_payment_allowance_delete',
            ],
            [
                'title' => 'salary_payment_allowance_access',
            ],
            [
                'title' => 'salary_payment_deduction_create',
            ],
            [
                'title' => 'salary_payment_deduction_delete',
            ],
            [
                'title' => 'salary_payment_deduction_access',
            ],
            [
                'title' => 'salary_payment_detail_create',
            ],
            [
                'title' => 'salary_payment_detail_delete',
            ],
            [
                'title' => 'salary_payment_detail_access',
            ],
            [
                'title' => 'salary_payslip_create',
            ],
            [
                'title' => 'salary_payslip_edit',
            ],
            [
                'title' => 'salary_payslip_show',
            ],
            [
                'title' => 'salary_payslip_delete',
            ],
            [
                'title' => 'salary_payslip_access',
            ],
            [
                'title' => 'hourly_rate_create',
            ],
            [
                'title' => 'hourly_rate_delete',
            ],
            [
                'title' => 'hourly_rate_access',
            ],
            [
                'title' => 'online_payment_create',
            ],
            [
                'title' => 'online_payment_delete',
            ],
            [
                'title' => 'online_payment_access',
            ],
            [
                'title' => 'setting_access',
            ],
            [
                'title' => 'vacation_create',
            ],
            [
                'title' => 'vacation_edit',
            ],
            [
                'title' => 'vacation_show',
            ],
            [
                'title' => 'vacation_delete',
            ],
            [
                'title' => 'vacation_access',
            ],
            [
                'title' => 'local_create',
            ],
            [
                'title' => 'local_delete',
            ],
            [
                'title' => 'local_access',
            ],
            [
                'title' => 'file_create',
            ],
            [
                'title' => 'file_show',
            ],
            [
                'title' => 'file_delete',
            ],
            [
                'title' => 'file_access',
            ],
            [
                'title' => 'task_uploaded_file_create',
            ],
            [
                'title' => 'task_uploaded_file_edit',
            ],
            [
                'title' => 'task_uploaded_file_show',
            ],
            [
                'title' => 'task_uploaded_file_delete',
            ],
            [
                'title' => 'task_uploaded_file_access',
            ],
            [
                'title' => 'task_attachment_create',
            ],
            [
                'title' => 'task_attachment_edit',
            ],
            [
                'title' => 'task_attachment_show',
            ],
            [
                'title' => 'task_attachment_delete',
            ],
            [
                'title' => 'task_attachment_access',
            ],
            [
                'title' => 'penalty_category_create',
            ],
            [
                'title' => 'penalty_category_delete',
            ],
            [
                'title' => 'penalty_category_access',
            ],
            [
                'title' => 'private_chat_create',
            ],
            [
                'title' => 'private_chat_delete',
            ],
            [
                'title' => 'private_chat_access',
            ],
            [
                'title' => 'todo_create',
            ],
            [
                'title' => 'todo_delete',
            ],
            [
                'title' => 'todo_access',
            ],
            [
                'title' => 'outgoing_email_create',
            ],
            [
                'title' => 'outgoing_email_edit',
            ],
            [
                'title' => 'outgoing_email_show',
            ],
            [
                'title' => 'outgoing_email_delete',
            ],
            [
                'title' => 'outgoing_email_access',
            ],
            [
                'title' => 'performance_indicator_create',
            ],
            [
                'title' => 'performance_indicator_edit',
            ],
            [
                'title' => 'performance_indicator_show',
            ],
            [
                'title' => 'performance_indicator_delete',
            ],
            [
                'title' => 'performance_indicator_access',
            ],
            [
                'title' => 'technical_category_show',
            ],
            [
                'title' => 'technical_category_access',
            ],
            [
                'title' => 'quotation_form_create',
            ],
            [
                'title' => 'quotation_form_edit',
            ],
            [
                'title' => 'quotation_form_show',
            ],
            [
                'title' => 'quotation_form_delete',
            ],
            [
                'title' => 'quotation_form_access',
            ],
            [
                'title' => 'quotation_create',
            ],
            [
                'title' => 'quotation_edit',
            ],
            [
                'title' => 'quotation_show',
            ],
            [
                'title' => 'quotation_delete',
            ],
            [
                'title' => 'quotation_access',
            ],
            [
                'title' => 'quotation_detail_create',
            ],
            [
                'title' => 'quotation_detail_delete',
            ],
            [
                'title' => 'quotation_detail_access',
            ],
            [
                'title' => 'dashboard_setting_create',
            ],
            [
                'title' => 'dashboard_setting_delete',
            ],
            [
                'title' => 'dashboard_setting_access',
            ],
            [
                'title' => 'expense_management_access',
            ],
            [
                'title' => 'expense_category_create',
            ],
            [
                'title' => 'expense_category_edit',
            ],
            [
                'title' => 'expense_category_show',
            ],
            [
                'title' => 'expense_category_delete',
            ],
            [
                'title' => 'expense_category_access',
            ],
            [
                'title' => 'income_category_create',
            ],
            [
                'title' => 'income_category_edit',
            ],
            [
                'title' => 'income_category_show',
            ],
            [
                'title' => 'income_category_delete',
            ],
            [
                'title' => 'income_category_access',
            ],
            [
                'title' => 'expense_create',
            ],
            [
                'title' => 'expense_edit',
            ],
            [
                'title' => 'expense_show',
            ],
            [
                'title' => 'expense_delete',
            ],
            [
                'title' => 'expense_access',
            ],
            [
                'title' => 'income_create',
            ],
            [
                'title' => 'income_edit',
            ],
            [
                'title' => 'income_show',
            ],
            [
                'title' => 'income_delete',
            ],
            [
                'title' => 'income_access',
            ],
            [
                'title' => 'expense_report_create',
            ],
            [
                'title' => 'expense_report_edit',
            ],
            [
                'title' => 'expense_report_show',
            ],
            [
                'title' => 'expense_report_delete',
            ],
            [
                'title' => 'expense_report_access',
            ],
            [
                'title' => 'profile_password_edit',
            ],

            /////////Requests////////////////
            [
                'title' => 'employee_request_create',
            ],
            [
                'title' => 'employee_request_edit',
            ],
            [
                'title' => 'employee_request_show',
            ],
            [
                'title' => 'employee_request_delete',
            ],
            [
                'title' => 'employee_request_access',
            ],
            /////////Requests////////////////
            /////////Set Times////////////////
            [
                'title' => 'set_time_create',
            ],
            [
                'title' => 'set_time_edit',
            ],
            [
                'title' => 'set_time_show',
            ],
            [
                'title' => 'set_time_delete',
            ],
            [
                'title' => 'set_time_access',
            ],
            [
                'title' => 'salary_template_show',
            ],
            [
                'title' => 'salary_template_edit',
            ],
            [
                'title' => 'salary_payment_detail_show',
            ],
            [
                'title' => 'payroll_summary',
            ],

            /////////Set Times////////////////
            /////////Settings////////////////
            // [
            //     'title' => 'setting_access',
            // ],
            /////////Settings////////////////
        ];

        Permission::insert($permissions);
    }
}
