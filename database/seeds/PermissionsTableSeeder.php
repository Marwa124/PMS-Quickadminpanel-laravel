<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'basic_c_r_m_access',
            ],
            [
                'id'    => 18,
                'title' => 'crm_status_create',
            ],
            [
                'id'    => 19,
                'title' => 'crm_status_delete',
            ],
            [
                'id'    => 20,
                'title' => 'crm_status_access',
            ],
            [
                'id'    => 21,
                'title' => 'crm_customer_create',
            ],
            [
                'id'    => 22,
                'title' => 'crm_customer_edit',
            ],
            [
                'id'    => 23,
                'title' => 'crm_customer_show',
            ],
            [
                'id'    => 24,
                'title' => 'crm_customer_delete',
            ],
            [
                'id'    => 25,
                'title' => 'crm_customer_access',
            ],
            [
                'id'    => 26,
                'title' => 'crm_note_create',
            ],
            [
                'id'    => 27,
                'title' => 'crm_note_edit',
            ],
            [
                'id'    => 28,
                'title' => 'crm_note_show',
            ],
            [
                'id'    => 29,
                'title' => 'crm_note_delete',
            ],
            [
                'id'    => 30,
                'title' => 'crm_note_access',
            ],
            [
                'id'    => 31,
                'title' => 'crm_document_create',
            ],
            [
                'id'    => 32,
                'title' => 'crm_document_edit',
            ],
            [
                'id'    => 33,
                'title' => 'crm_document_show',
            ],
            [
                'id'    => 34,
                'title' => 'crm_document_delete',
            ],
            [
                'id'    => 35,
                'title' => 'crm_document_access',
            ],
            [
                'id'    => 36,
                'title' => 'hr_access',
            ],
            [
                'id'    => 37,
                'title' => 'employee_create',
            ],
            [
                'id'    => 38,
                'title' => 'employee_edit',
            ],
            [
                'id'    => 39,
                'title' => 'employee_show',
            ],
            [
                'id'    => 40,
                'title' => 'employee_delete',
            ],
            [
                'id'    => 41,
                'title' => 'employee_access',
            ],
            [
                'id'    => 42,
                'title' => 'time_management_access',
            ],
            [
                'id'    => 43,
                'title' => 'time_work_type_create',
            ],
            [
                'id'    => 44,
                'title' => 'time_work_type_edit',
            ],
            [
                'id'    => 45,
                'title' => 'time_work_type_show',
            ],
            [
                'id'    => 46,
                'title' => 'time_work_type_delete',
            ],
            [
                'id'    => 47,
                'title' => 'time_work_type_access',
            ],
            [
                'id'    => 48,
                'title' => 'time_project_create',
            ],
            [
                'id'    => 49,
                'title' => 'time_project_edit',
            ],
            [
                'id'    => 50,
                'title' => 'time_project_show',
            ],
            [
                'id'    => 51,
                'title' => 'time_project_delete',
            ],
            [
                'id'    => 52,
                'title' => 'time_project_access',
            ],
            [
                'id'    => 53,
                'title' => 'time_entry_create',
            ],
            [
                'id'    => 54,
                'title' => 'time_entry_edit',
            ],
            [
                'id'    => 55,
                'title' => 'time_entry_show',
            ],
            [
                'id'    => 56,
                'title' => 'time_entry_delete',
            ],
            [
                'id'    => 57,
                'title' => 'time_entry_access',
            ],
            [
                'id'    => 58,
                'title' => 'time_report_create',
            ],
            [
                'id'    => 59,
                'title' => 'time_report_edit',
            ],
            [
                'id'    => 60,
                'title' => 'time_report_show',
            ],
            [
                'id'    => 61,
                'title' => 'time_report_delete',
            ],
            [
                'id'    => 62,
                'title' => 'time_report_access',
            ],
            [
                'id'    => 63,
                'title' => 'task_management_access',
            ],
            [
                'id'    => 64,
                'title' => 'task_status_create',
            ],
            [
                'id'    => 65,
                'title' => 'task_status_edit',
            ],
            [
                'id'    => 66,
                'title' => 'task_status_show',
            ],
            [
                'id'    => 67,
                'title' => 'task_status_delete',
            ],
            [
                'id'    => 68,
                'title' => 'task_status_access',
            ],
            [
                'id'    => 69,
                'title' => 'task_tag_create',
            ],
            [
                'id'    => 70,
                'title' => 'task_tag_edit',
            ],
            [
                'id'    => 71,
                'title' => 'task_tag_show',
            ],
            [
                'id'    => 72,
                'title' => 'task_tag_delete',
            ],
            [
                'id'    => 73,
                'title' => 'task_tag_access',
            ],
            [
                'id'    => 74,
                'title' => 'task_create',
            ],
            [
                'id'    => 75,
                'title' => 'task_edit',
            ],
            [
                'id'    => 76,
                'title' => 'task_show',
            ],
            [
                'id'    => 77,
                'title' => 'task_delete',
            ],
            [
                'id'    => 78,
                'title' => 'task_access',
            ],
            [
                'id'    => 79,
                'title' => 'tasks_calendar_access',
            ],
            [
                'id'    => 80,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 81,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 82,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 83,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 84,
                'title' => 'department_create',
            ],
            [
                'id'    => 85,
                'title' => 'department_edit',
            ],
            [
                'id'    => 86,
                'title' => 'department_show',
            ],
            [
                'id'    => 87,
                'title' => 'department_delete',
            ],
            [
                'id'    => 88,
                'title' => 'department_access',
            ],
            [
                'id'    => 89,
                'title' => 'designation_create',
            ],
            [
                'id'    => 90,
                'title' => 'designation_edit',
            ],
            [
                'id'    => 91,
                'title' => 'designation_show',
            ],
            [
                'id'    => 92,
                'title' => 'designation_delete',
            ],
            [
                'id'    => 93,
                'title' => 'designation_access',
            ],
            [
                'id'    => 94,
                'title' => 'account_detail_create',
            ],
            [
                'id'    => 95,
                'title' => 'account_detail_edit',
            ],
            [
                'id'    => 96,
                'title' => 'account_detail_show',
            ],
            [
                'id'    => 97,
                'title' => 'account_detail_delete',
            ],
            [
                'id'    => 98,
                'title' => 'account_detail_access',
            ],
            [
                'id'    => 99,
                'title' => 'overtime_create',
            ],
            [
                'id'    => 100,
                'title' => 'overtime_edit',
            ],
            [
                'id'    => 101,
                'title' => 'overtime_show',
            ],
            [
                'id'    => 102,
                'title' => 'overtime_delete',
            ],
            [
                'id'    => 103,
                'title' => 'overtime_access',
            ],
            [
                'id'    => 104,
                'title' => 'holiday_create',
            ],
            [
                'id'    => 105,
                'title' => 'holiday_edit',
            ],
            [
                'id'    => 106,
                'title' => 'holiday_show',
            ],
            [
                'id'    => 107,
                'title' => 'holiday_delete',
            ],
            [
                'id'    => 108,
                'title' => 'holiday_access',
            ],
            [
                'id'    => 109,
                'title' => 'training_create',
            ],
            [
                'id'    => 110,
                'title' => 'training_edit',
            ],
            [
                'id'    => 111,
                'title' => 'training_show',
            ],
            [
                'id'    => 112,
                'title' => 'training_delete',
            ],
            [
                'id'    => 113,
                'title' => 'training_access',
            ],
            [
                'id'    => 114,
                'title' => 'leave_category_create',
            ],
            [
                'id'    => 115,
                'title' => 'leave_category_edit',
            ],
            [
                'id'    => 116,
                'title' => 'leave_category_show',
            ],
            [
                'id'    => 117,
                'title' => 'leave_category_delete',
            ],
            [
                'id'    => 118,
                'title' => 'leave_category_access',
            ],
            [
                'id'    => 119,
                'title' => 'leave_application_create',
            ],
            [
                'id'    => 120,
                'title' => 'leave_application_edit',
            ],
            [
                'id'    => 121,
                'title' => 'leave_application_show',
            ],
            [
                'id'    => 122,
                'title' => 'leave_application_delete',
            ],
            [
                'id'    => 123,
                'title' => 'leave_application_access',
            ],
            [
                'id'    => 124,
                'title' => 'meeting_minute_create',
            ],
            [
                'id'    => 125,
                'title' => 'meeting_minute_edit',
            ],
            [
                'id'    => 126,
                'title' => 'meeting_minute_show',
            ],
            [
                'id'    => 127,
                'title' => 'meeting_minute_delete',
            ],
            [
                'id'    => 128,
                'title' => 'meeting_minute_access',
            ],
            [
                'id'    => 129,
                'title' => 'employee_award_create',
            ],
            [
                'id'    => 130,
                'title' => 'employee_award_edit',
            ],
            [
                'id'    => 131,
                'title' => 'employee_award_show',
            ],
            [
                'id'    => 132,
                'title' => 'employee_award_delete',
            ],
            [
                'id'    => 133,
                'title' => 'employee_award_access',
            ],
            // [
            //     'id'    => 134,
            //     'title' => 'attendances_access',
            // ],
            [
                'id'    => 135,
                'title' => 'attendances_create',
            ],
            [
                'id'    => 136,
                'title' => 'attendances_edit',
            ],
            [
                'id'    => 137,
                'title' => 'attendances_show',
            ],
            [
                'id'    => 138,
                'title' => 'attendances_delete',
            ],
            [
                'id'    => 139,
                'title' => 'attendances_access',
            ],
            [
                'id'    => 140,
                'title' => 'employees_access',
            ],
            [
                'id'    => 141,
                'title' => 'daily_attendance_create',
            ],
            [
                'id'    => 142,
                'title' => 'daily_attendance_edit',
            ],
            [
                'id'    => 143,
                'title' => 'daily_attendance_show',
            ],
            [
                'id'    => 144,
                'title' => 'daily_attendance_delete',
            ],
            [
                'id'    => 145,
                'title' => 'daily_attendance_access',
            ],
            [
                'id'    => 146,
                'title' => 'monthly_attendance_show',
            ],
            [
                'id'    => 147,
                'title' => 'monthly_attendance_access',
            ],
            [
                'id'    => 148,
                'title' => 'recruitment_access',
            ],
            [
                'id'    => 149,
                'title' => 'job_circular_create',
            ],
            [
                'id'    => 150,
                'title' => 'job_circular_edit',
            ],
            [
                'id'    => 151,
                'title' => 'job_circular_show',
            ],
            [
                'id'    => 152,
                'title' => 'job_circular_delete',
            ],
            [
                'id'    => 153,
                'title' => 'job_circular_access',
            ],
            [
                'id'    => 154,
                'title' => 'job_application_create',
            ],
            [
                'id'    => 155,
                'title' => 'job_application_edit',
            ],
            [
                'id'    => 156,
                'title' => 'job_application_show',
            ],
            [
                'id'    => 157,
                'title' => 'job_application_delete',
            ],
            [
                'id'    => 158,
                'title' => 'job_application_access',
            ],
            [
                'id'    => 159,
                'title' => 'project_management_access',
            ],
            [
                'id'    => 160,
                'title' => 'sale_access',
            ],
            [
                'id'    => 161,
                'title' => 'proposal_create',
            ],
            [
                'id'    => 162,
                'title' => 'proposal_edit',
            ],
            [
                'id'    => 163,
                'title' => 'proposal_show',
            ],
            [
                'id'    => 164,
                'title' => 'proposal_delete',
            ],
            [
                'id'    => 165,
                'title' => 'proposal_access',
            ],
            [
                'id'    => 166,
                'title' => 'interested_in_create',
            ],
            [
                'id'    => 167,
                'title' => 'interested_in_delete',
            ],
            [
                'id'    => 168,
                'title' => 'interested_in_access',
            ],
            [
                'id'    => 169,
                'title' => 'lead_category_create',
            ],
            [
                'id'    => 170,
                'title' => 'lead_category_edit',
            ],
            [
                'id'    => 171,
                'title' => 'lead_category_show',
            ],
            [
                'id'    => 172,
                'title' => 'lead_category_delete',
            ],
            [
                'id'    => 173,
                'title' => 'lead_category_access',
            ],
            [
                'id'    => 174,
                'title' => 'lead_source_create',
            ],
            [
                'id'    => 175,
                'title' => 'lead_source_delete',
            ],
            [
                'id'    => 176,
                'title' => 'lead_source_access',
            ],
            [
                'id'    => 177,
                'title' => 'lead_status_create',
            ],
            [
                'id'    => 178,
                'title' => 'lead_status_delete',
            ],
            [
                'id'    => 179,
                'title' => 'lead_status_access',
            ],
            [
                'id'    => 180,
                'title' => 'salutation_create',
            ],
            [
                'id'    => 181,
                'title' => 'salutation_delete',
            ],
            [
                'id'    => 182,
                'title' => 'salutation_access',
            ],
            [
                'id'    => 183,
                'title' => 'lead_create',
            ],
            [
                'id'    => 184,
                'title' => 'lead_edit',
            ],
            [
                'id'    => 185,
                'title' => 'lead_show',
            ],
            [
                'id'    => 186,
                'title' => 'lead_delete',
            ],
            [
                'id'    => 187,
                'title' => 'lead_access',
            ],
            [
                'id'    => 188,
                'title' => 'opportunity_create',
            ],
            [
                'id'    => 189,
                'title' => 'opportunity_edit',
            ],
            [
                'id'    => 190,
                'title' => 'opportunity_show',
            ],
            [
                'id'    => 191,
                'title' => 'opportunity_delete',
            ],
            [
                'id'    => 192,
                'title' => 'opportunity_access',
            ],
            [
                'id'    => 193,
                'title' => 'client_create',
            ],
            [
                'id'    => 194,
                'title' => 'client_edit',
            ],
            [
                'id'    => 195,
                'title' => 'client_show',
            ],
            [
                'id'    => 196,
                'title' => 'client_delete',
            ],
            [
                'id'    => 197,
                'title' => 'client_access',
            ],
            [
                'id'    => 198,
                'title' => 'client_menu_create',
            ],
            [
                'id'    => 199,
                'title' => 'client_menu_edit',
            ],
            [
                'id'    => 200,
                'title' => 'client_menu_show',
            ],
            [
                'id'    => 201,
                'title' => 'client_menu_delete',
            ],
            [
                'id'    => 202,
                'title' => 'client_menu_access',
            ],
            [
                'id'    => 203,
                'title' => 'menu_create',
            ],
            [
                'id'    => 204,
                'title' => 'menu_edit',
            ],
            [
                'id'    => 205,
                'title' => 'menu_show',
            ],
            [
                'id'    => 206,
                'title' => 'menu_delete',
            ],
            [
                'id'    => 207,
                'title' => 'menu_access',
            ],
            [
                'id'    => 208,
                'title' => 'project_create',
            ],
            [
                'id'    => 209,
                'title' => 'project_edit',
            ],
            [
                'id'    => 210,
                'title' => 'project_show',
            ],
            [
                'id'    => 211,
                'title' => 'project_delete',
            ],
            [
                'id'    => 212,
                'title' => 'project_access',
            ],
            [
                'id'    => 213,
                'title' => 'project_setting_create',
            ],
            [
                'id'    => 214,
                'title' => 'project_setting_delete',
            ],
            [
                'id'    => 215,
                'title' => 'project_setting_access',
            ],
            [
                'id'    => 216,
                'title' => 'work_tracking_create',
            ],
            [
                'id'    => 217,
                'title' => 'work_tracking_edit',
            ],
            [
                'id'    => 218,
                'title' => 'work_tracking_show',
            ],
            [
                'id'    => 219,
                'title' => 'work_tracking_delete',
            ],
            [
                'id'    => 220,
                'title' => 'work_tracking_access',
            ],
            [
                'id'    => 221,
                'title' => 'account_create',
            ],
            [
                'id'    => 222,
                'title' => 'account_edit',
            ],
            [
                'id'    => 223,
                'title' => 'account_show',
            ],
            [
                'id'    => 224,
                'title' => 'account_delete',
            ],
            [
                'id'    => 225,
                'title' => 'account_access',
            ],
            [
                'id'    => 226,
                'title' => 'milestone_create',
            ],
            [
                'id'    => 227,
                'title' => 'milestone_edit',
            ],
            [
                'id'    => 228,
                'title' => 'milestone_show',
            ],
            [
                'id'    => 229,
                'title' => 'milestone_delete',
            ],
            [
                'id'    => 230,
                'title' => 'milestone_access',
            ],
            [
                'id'    => 231,
                'title' => 'bug_create',
            ],
            [
                'id'    => 232,
                'title' => 'bug_edit',
            ],
            [
                'id'    => 233,
                'title' => 'bug_show',
            ],
            [
                'id'    => 234,
                'title' => 'bug_delete',
            ],
            [
                'id'    => 235,
                'title' => 'bug_access',
            ],
            [
                'id'    => 236,
                'title' => 'ticket_create',
            ],
            [
                'id'    => 237,
                'title' => 'ticket_edit',
            ],
            [
                'id'    => 238,
                'title' => 'ticket_show',
            ],
            [
                'id'    => 239,
                'title' => 'ticket_delete',
            ],
            [
                'id'    => 240,
                'title' => 'ticket_access',
            ],
            [
                'id'    => 241,
                'title' => 'adminstration_access',
            ],
            [
                'id'    => 242,
                'title' => 'announcement_create',
            ],
            [
                'id'    => 243,
                'title' => 'announcement_edit',
            ],
            [
                'id'    => 244,
                'title' => 'announcement_show',
            ],
            [
                'id'    => 245,
                'title' => 'announcement_delete',
            ],
            [
                'id'    => 246,
                'title' => 'announcement_access',
            ],
            [
                'id'    => 247,
                'title' => 'kb_category_create',
            ],
            [
                'id'    => 248,
                'title' => 'kb_category_delete',
            ],
            [
                'id'    => 249,
                'title' => 'kb_category_access',
            ],
            [
                'id'    => 250,
                'title' => 'materials_supplier_access',
            ],
            [
                'id'    => 251,
                'title' => 'customer_group_create',
            ],
            [
                'id'    => 252,
                'title' => 'customer_group_edit',
            ],
            [
                'id'    => 253,
                'title' => 'customer_group_show',
            ],
            [
                'id'    => 254,
                'title' => 'customer_group_delete',
            ],
            [
                'id'    => 255,
                'title' => 'customer_group_access',
            ],
            [
                'id'    => 256,
                'title' => 'finance_access',
            ],
            [
                'id'    => 257,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 258,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 259,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 260,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 261,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 262,
                'title' => 'proposals_item_create',
            ],
            [
                'id'    => 263,
                'title' => 'proposals_item_edit',
            ],
            [
                'id'    => 264,
                'title' => 'proposals_item_show',
            ],
            [
                'id'    => 265,
                'title' => 'proposals_item_delete',
            ],
            [
                'id'    => 266,
                'title' => 'proposals_item_access',
            ],
            [
                'id'    => 267,
                'title' => 'supplier_create',
            ],
            [
                'id'    => 268,
                'title' => 'supplier_edit',
            ],
            [
                'id'    => 269,
                'title' => 'supplier_show',
            ],
            [
                'id'    => 270,
                'title' => 'supplier_delete',
            ],
            [
                'id'    => 271,
                'title' => 'supplier_access',
            ],
            [
                'id'    => 272,
                'title' => 'purchase_create',
            ],
            [
                'id'    => 273,
                'title' => 'purchase_edit',
            ],
            [
                'id'    => 274,
                'title' => 'purchase_show',
            ],
            [
                'id'    => 275,
                'title' => 'purchase_delete',
            ],
            [
                'id'    => 276,
                'title' => 'purchase_access',
            ],
            [
                'id'    => 277,
                'title' => 'return_stock_create',
            ],
            [
                'id'    => 278,
                'title' => 'return_stock_edit',
            ],
            [
                'id'    => 279,
                'title' => 'return_stock_show',
            ],
            [
                'id'    => 280,
                'title' => 'return_stock_delete',
            ],
            [
                'id'    => 281,
                'title' => 'return_stock_access',
            ],
            [
                'id'    => 282,
                'title' => 'purchase_payment_create',
            ],
            [
                'id'    => 283,
                'title' => 'purchase_payment_edit',
            ],
            [
                'id'    => 284,
                'title' => 'purchase_payment_show',
            ],
            [
                'id'    => 285,
                'title' => 'purchase_payment_delete',
            ],
            [
                'id'    => 286,
                'title' => 'purchase_payment_access',
            ],
            [
                'id'    => 287,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 288,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 289,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 290,
                'title' => 'payment_create',
            ],
            [
                'id'    => 291,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 292,
                'title' => 'payment_show',
            ],
            [
                'id'    => 293,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 294,
                'title' => 'payment_access',
            ],
            [
                'id'    => 295,
                'title' => 'transaction_create',
            ],
            [
                'id'    => 296,
                'title' => 'transaction_edit',
            ],
            [
                'id'    => 297,
                'title' => 'transaction_show',
            ],
            [
                'id'    => 298,
                'title' => 'transaction_delete',
            ],
            [
                'id'    => 299,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 300,
                'title' => 'transfer_create',
            ],
            [
                'id'    => 301,
                'title' => 'transfer_edit',
            ],
            [
                'id'    => 302,
                'title' => 'transfer_show',
            ],
            [
                'id'    => 303,
                'title' => 'transfer_delete',
            ],
            [
                'id'    => 304,
                'title' => 'transfer_access',
            ],
            [
                'id'    => 305,
                'title' => 'employee_bank_create',
            ],
            [
                'id'    => 306,
                'title' => 'employee_bank_edit',
            ],
            [
                'id'    => 307,
                'title' => 'employee_bank_show',
            ],
            [
                'id'    => 308,
                'title' => 'employee_bank_delete',
            ],
            [
                'id'    => 309,
                'title' => 'employee_bank_access',
            ],
            [
                'id'    => 310,
                'title' => 'tax_rate_create',
            ],
            [
                'id'    => 311,
                'title' => 'tax_rate_edit',
            ],
            [
                'id'    => 312,
                'title' => 'tax_rate_show',
            ],
            [
                'id'    => 313,
                'title' => 'tax_rate_delete',
            ],
            [
                'id'    => 314,
                'title' => 'tax_rate_access',
            ],
            [
                'id'    => 315,
                'title' => 'office_asset_access',
            ],
            [
                'id'    => 316,
                'title' => 'stock_category_create',
            ],
            [
                'id'    => 317,
                'title' => 'stock_category_delete',
            ],
            [
                'id'    => 318,
                'title' => 'stock_category_access',
            ],
            [
                'id'    => 319,
                'title' => 'stock_sub_category_create',
            ],
            [
                'id'    => 320,
                'title' => 'stock_sub_category_delete',
            ],
            [
                'id'    => 321,
                'title' => 'stock_sub_category_access',
            ],
            [
                'id'    => 322,
                'title' => 'stock_create',
            ],
            [
                'id'    => 323,
                'title' => 'stock_edit',
            ],
            [
                'id'    => 324,
                'title' => 'stock_delete',
            ],
            [
                'id'    => 325,
                'title' => 'stock_access',
            ],
            [
                'id'    => 326,
                'title' => 'payroll_access',
            ],
            [
                'id'    => 327,
                'title' => 'advance_salary_create',
            ],
            [
                'id'    => 328,
                'title' => 'advance_salary_edit',
            ],
            [
                'id'    => 329,
                'title' => 'advance_salary_show',
            ],
            [
                'id'    => 330,
                'title' => 'advance_salary_delete',
            ],
            [
                'id'    => 331,
                'title' => 'advance_salary_access',
            ],
            [
                'id'    => 332,
                'title' => 'salary_allowance_create',
            ],
            [
                'id'    => 333,
                'title' => 'salary_allowance_delete',
            ],
            [
                'id'    => 334,
                'title' => 'salary_allowance_access',
            ],
            [
                'id'    => 335,
                'title' => 'salary_template_create',
            ],
            [
                'id'    => 336,
                'title' => 'salary_template_delete',
            ],
            [
                'id'    => 337,
                'title' => 'salary_template_access',
            ],
            [
                'id'    => 338,
                'title' => 'salary_deduction_create',
            ],
            [
                'id'    => 339,
                'title' => 'salary_deduction_delete',
            ],
            [
                'id'    => 340,
                'title' => 'salary_deduction_access',
            ],
            [
                'id'    => 341,
                'title' => 'salary_payment_create',
            ],
            [
                'id'    => 342,
                'title' => 'salary_payment_edit',
            ],
            [
                'id'    => 343,
                'title' => 'salary_payment_show',
            ],
            [
                'id'    => 344,
                'title' => 'salary_payment_delete',
            ],
            [
                'id'    => 345,
                'title' => 'salary_payment_access',
            ],
            [
                'id'    => 346,
                'title' => 'salary_payment_allowance_create',
            ],
            [
                'id'    => 347,
                'title' => 'salary_payment_allowance_delete',
            ],
            [
                'id'    => 348,
                'title' => 'salary_payment_allowance_access',
            ],
            [
                'id'    => 349,
                'title' => 'salary_payment_deduction_create',
            ],
            [
                'id'    => 350,
                'title' => 'salary_payment_deduction_delete',
            ],
            [
                'id'    => 351,
                'title' => 'salary_payment_deduction_access',
            ],
            [
                'id'    => 352,
                'title' => 'salary_payment_detail_create',
            ],
            [
                'id'    => 353,
                'title' => 'salary_payment_detail_delete',
            ],
            [
                'id'    => 354,
                'title' => 'salary_payment_detail_access',
            ],
            [
                'id'    => 355,
                'title' => 'salary_payslip_create',
            ],
            [
                'id'    => 356,
                'title' => 'salary_payslip_edit',
            ],
            [
                'id'    => 357,
                'title' => 'salary_payslip_show',
            ],
            [
                'id'    => 358,
                'title' => 'salary_payslip_delete',
            ],
            [
                'id'    => 359,
                'title' => 'salary_payslip_access',
            ],
            [
                'id'    => 360,
                'title' => 'hourly_rate_create',
            ],
            [
                'id'    => 361,
                'title' => 'hourly_rate_delete',
            ],
            [
                'id'    => 362,
                'title' => 'hourly_rate_access',
            ],
            [
                'id'    => 363,
                'title' => 'online_payment_create',
            ],
            [
                'id'    => 364,
                'title' => 'online_payment_delete',
            ],
            [
                'id'    => 365,
                'title' => 'online_payment_access',
            ],
            [
                'id'    => 366,
                'title' => 'setting_access',
            ],
            [
                'id'    => 367,
                'title' => 'vacation_create',
            ],
            [
                'id'    => 368,
                'title' => 'vacation_edit',
            ],
            [
                'id'    => 369,
                'title' => 'vacation_show',
            ],
            [
                'id'    => 370,
                'title' => 'vacation_delete',
            ],
            [
                'id'    => 371,
                'title' => 'vacation_access',
            ],
            [
                'id'    => 372,
                'title' => 'local_create',
            ],
            [
                'id'    => 373,
                'title' => 'local_delete',
            ],
            [
                'id'    => 374,
                'title' => 'local_access',
            ],
            [
                'id'    => 375,
                'title' => 'file_create',
            ],
            [
                'id'    => 376,
                'title' => 'file_show',
            ],
            [
                'id'    => 377,
                'title' => 'file_delete',
            ],
            [
                'id'    => 378,
                'title' => 'file_access',
            ],
            [
                'id'    => 379,
                'title' => 'task_uploaded_file_create',
            ],
            [
                'id'    => 380,
                'title' => 'task_uploaded_file_edit',
            ],
            [
                'id'    => 381,
                'title' => 'task_uploaded_file_show',
            ],
            [
                'id'    => 382,
                'title' => 'task_uploaded_file_delete',
            ],
            [
                'id'    => 383,
                'title' => 'task_uploaded_file_access',
            ],
            [
                'id'    => 384,
                'title' => 'task_attachment_create',
            ],
            [
                'id'    => 385,
                'title' => 'task_attachment_edit',
            ],
            [
                'id'    => 386,
                'title' => 'task_attachment_show',
            ],
            [
                'id'    => 387,
                'title' => 'task_attachment_delete',
            ],
            [
                'id'    => 388,
                'title' => 'task_attachment_access',
            ],
            [
                'id'    => 389,
                'title' => 'penalty_category_create',
            ],
            [
                'id'    => 390,
                'title' => 'penalty_category_delete',
            ],
            [
                'id'    => 391,
                'title' => 'penalty_category_access',
            ],
            [
                'id'    => 392,
                'title' => 'private_chat_create',
            ],
            [
                'id'    => 393,
                'title' => 'private_chat_delete',
            ],
            [
                'id'    => 394,
                'title' => 'private_chat_access',
            ],
            [
                'id'    => 395,
                'title' => 'todo_create',
            ],
            [
                'id'    => 396,
                'title' => 'todo_delete',
            ],
            [
                'id'    => 397,
                'title' => 'todo_access',
            ],
            [
                'id'    => 398,
                'title' => 'outgoing_email_create',
            ],
            [
                'id'    => 399,
                'title' => 'outgoing_email_edit',
            ],
            [
                'id'    => 400,
                'title' => 'outgoing_email_show',
            ],
            [
                'id'    => 401,
                'title' => 'outgoing_email_delete',
            ],
            [
                'id'    => 402,
                'title' => 'outgoing_email_access',
            ],
            [
                'id'    => 403,
                'title' => 'performance_indicator_create',
            ],
            [
                'id'    => 404,
                'title' => 'performance_indicator_edit',
            ],
            [
                'id'    => 405,
                'title' => 'performance_indicator_show',
            ],
            [
                'id'    => 406,
                'title' => 'performance_indicator_delete',
            ],
            [
                'id'    => 407,
                'title' => 'performance_indicator_access',
            ],
            [
                'id'    => 408,
                'title' => 'technical_category_show',
            ],
            [
                'id'    => 409,
                'title' => 'technical_category_access',
            ],
            [
                'id'    => 410,
                'title' => 'quotation_form_create',
            ],
            [
                'id'    => 411,
                'title' => 'quotation_form_edit',
            ],
            [
                'id'    => 412,
                'title' => 'quotation_form_show',
            ],
            [
                'id'    => 413,
                'title' => 'quotation_form_delete',
            ],
            [
                'id'    => 414,
                'title' => 'quotation_form_access',
            ],
            [
                'id'    => 415,
                'title' => 'quotation_create',
            ],
            [
                'id'    => 416,
                'title' => 'quotation_edit',
            ],
            [
                'id'    => 417,
                'title' => 'quotation_show',
            ],
            [
                'id'    => 418,
                'title' => 'quotation_delete',
            ],
            [
                'id'    => 419,
                'title' => 'quotation_access',
            ],
            [
                'id'    => 420,
                'title' => 'quotation_detail_create',
            ],
            [
                'id'    => 421,
                'title' => 'quotation_detail_delete',
            ],
            [
                'id'    => 422,
                'title' => 'quotation_detail_access',
            ],
            [
                'id'    => 423,
                'title' => 'dashboard_setting_create',
            ],
            [
                'id'    => 424,
                'title' => 'dashboard_setting_delete',
            ],
            [
                'id'    => 425,
                'title' => 'dashboard_setting_access',
            ],
            [
                'id'    => 426,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 427,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 428,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 429,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 430,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 431,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 432,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 433,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 434,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 435,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 436,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 437,
                'title' => 'expense_create',
            ],
            [
                'id'    => 438,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 439,
                'title' => 'expense_show',
            ],
            [
                'id'    => 440,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 441,
                'title' => 'expense_access',
            ],
            [
                'id'    => 442,
                'title' => 'income_create',
            ],
            [
                'id'    => 443,
                'title' => 'income_edit',
            ],
            [
                'id'    => 444,
                'title' => 'income_show',
            ],
            [
                'id'    => 445,
                'title' => 'income_delete',
            ],
            [
                'id'    => 446,
                'title' => 'income_access',
            ],
            [
                'id'    => 447,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 448,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 449,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 450,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 451,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 452,
                'title' => 'profile_password_edit',
            ],

            /////////Requests////////////////
            [
                'id'    => 453,
                'title' => 'employee_request_create',
            ],
            [
                'id'    => 454,
                'title' => 'employee_request_edit',
            ],
            [
                'id'    => 455,
                'title' => 'employee_request_show',
            ],
            [
                'id'    => 456,
                'title' => 'employee_request_delete',
            ],
            [
                'id'    => 457,
                'title' => 'employee_request_access',
            ],
            /////////Requests////////////////
            /////////Set Times////////////////
            [
                'id'    => 458,
                'title' => 'set_time_create',
            ],
            [
                'id'    => 459,
                'title' => 'set_time_edit',
            ],
            [
                'id'    => 460,
                'title' => 'set_time_show',
            ],
            [
                'id'    => 461,
                'title' => 'set_time_delete',
            ],
            [
                'id'    => 462,
                'title' => 'set_time_access',
            ],
            /////////Set Times////////////////
            /////////Settings////////////////
            // [
            //     'id'    => 463,
            //     'title' => 'setting_access',
            // ],
            /////////Settings////////////////
        ];

        Permission::insert($permissions);
    }
}
