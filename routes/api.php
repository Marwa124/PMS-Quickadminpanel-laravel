<?php

// Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
//     // Permissions
//     Route::apiResource('permissions', 'PermissionsApiController');

//     // Roles
//     Route::apiResource('roles', 'RolesApiController');

//     // Users
//     Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
//     Route::apiResource('users', 'UsersApiController');

//     // Crm Statuses
//     Route::apiResource('crm-statuses', 'CrmStatusApiController', ['except' => ['show', 'update']]);

//     // Crm Customers
//     Route::apiResource('crm-customers', 'CrmCustomerApiController');

//     // Crm Notes
//     Route::apiResource('crm-notes', 'CrmNoteApiController');

//     // Crm Documents
//     Route::post('crm-documents/media', 'CrmDocumentApiController@storeMedia')->name('crm-documents.storeMedia');
//     Route::apiResource('crm-documents', 'CrmDocumentApiController');

//     // Employees
//     Route::apiResource('employees', 'EmployeesApiController');

//     // Time Work Types
//     Route::post('time-work-types/media', 'TimeWorkTypeApiController@storeMedia')->name('time-work-types.storeMedia');
//     Route::apiResource('time-work-types', 'TimeWorkTypeApiController');

//     // Time Projects
//     Route::apiResource('time-projects', 'TimeProjectApiController');

//     // Time Entries
//     Route::apiResource('time-entries', 'TimeEntryApiController');

//     // Task Statuses
//     Route::apiResource('task-statuses', 'TaskStatusApiController');

//     // Task Tags
//     Route::apiResource('task-tags', 'TaskTagApiController');

//     // Tasks
//     Route::post('tasks/media', 'TaskApiController@storeMedia')->name('tasks.storeMedia');
//     Route::apiResource('tasks', 'TaskApiController');

//     // Departments
//     Route::apiResource('departments', 'DepartmentsApiController');

//     // Designations
//     Route::apiResource('designations', 'DesignationsApiController');

//     // Account Details
//     Route::post('account-details/media', 'AccountDetailsApiController@storeMedia')->name('account-details.storeMedia');
//     Route::get('/row-details', 'APIController@getRowDetailsData')->name('row_details');
//     Route::apiResource('account-details', 'AccountDetailsApiController');

//     // Overtimes
//     Route::post('overtimes/media', 'OvertimeApiController@storeMedia')->name('overtimes.storeMedia');
//     Route::apiResource('overtimes', 'OvertimeApiController');

//     // Holidays
//     Route::apiResource('holidays', 'HolidaysApiController');

//     // Trainings
//     Route::post('trainings/media', 'TrainingsApiController@storeMedia')->name('trainings.storeMedia');
//     Route::apiResource('trainings', 'TrainingsApiController');

//     // Leave Categories
//     Route::apiResource('leave-categories', 'LeaveCategoriesApiController');

//     // Leave Applications
//     Route::post('leave-applications/media', 'LeaveApplicationsApiController@storeMedia')->name('leave-applications.storeMedia');
//     Route::apiResource('leave-applications', 'LeaveApplicationsApiController');

//     // Meeting Minutes
//     Route::post('meeting-minutes/media', 'MeetingMinutesApiController@storeMedia')->name('meeting-minutes.storeMedia');
//     Route::apiResource('meeting-minutes', 'MeetingMinutesApiController');

//     // Employee Awards
//     Route::apiResource('employee-awards', 'EmployeeAwardsApiController');

//     // attendances
//     Route::apiResource('attendances', 'attendancesApiController');

//     // Daily Attendances
//     Route::apiResource('daily-attendances', 'DailyAttendancesApiController');

//     // Monthly Attendances
//     Route::apiResource('monthly-attendances', 'MonthlyAttendancesApiController', ['except' => ['store', 'update', 'destroy']]);

//     // Job Circulars
//     Route::post('job-circulars/media', 'JobCircularsApiController@storeMedia')->name('job-circulars.storeMedia');
//     Route::apiResource('job-circulars', 'JobCircularsApiController');

//     // Job Applications
//     Route::post('job-applications/media', 'JobApplicationApiController@storeMedia')->name('job-applications.storeMedia');
//     Route::apiResource('job-applications', 'JobApplicationApiController');

//     // Proposals
//     Route::post('proposals/media', 'ProposalsApiController@storeMedia')->name('proposals.storeMedia');
//     Route::apiResource('proposals', 'ProposalsApiController');

//     // Interested Ins
//     Route::apiResource('interested-ins', 'InterestedInApiController', ['except' => ['show', 'update']]);

//     // Lead Categories
//     Route::apiResource('lead-categories', 'LeadCategoriesApiController');

//     // Lead Sources
//     Route::apiResource('lead-sources', 'LeadSourcesApiController', ['except' => ['show', 'update']]);

//     // Lead Statuses
//     Route::apiResource('lead-statuses', 'LeadStatusApiController', ['except' => ['show', 'update']]);

//     // Salutations
//     Route::apiResource('salutations', 'SalutationsApiController', ['except' => ['show', 'update']]);

//     // Leads
//     Route::post('leads/media', 'LeadsApiController@storeMedia')->name('leads.storeMedia');
//     Route::apiResource('leads', 'LeadsApiController');

//     // Opportunities
//     Route::post('opportunities/media', 'OpportunitiesApiController@storeMedia')->name('opportunities.storeMedia');
//     Route::apiResource('opportunities', 'OpportunitiesApiController');

//     // Clients
//     Route::post('clients/media', 'ClientsApiController@storeMedia')->name('clients.storeMedia');
//     Route::apiResource('clients', 'ClientsApiController');

//     // Client Menus
//     Route::apiResource('client-menus', 'ClientMenuApiController');

//     // Menus
//     Route::apiResource('menus', 'MenuApiController');

//     // Projects
//     Route::post('projects/media', 'ProjectsApiController@storeMedia')->name('projects.storeMedia');
//     Route::apiResource('projects', 'ProjectsApiController');

//     // Project Settings
//     Route::apiResource('project-settings', 'ProjectSettingsApiController', ['except' => ['show', 'update']]);

//     // Work Trackings
//     Route::apiResource('work-trackings', 'WorkTrackingApiController');

//     // Accounts
//     Route::apiResource('accounts', 'AccountsApiController');

//     // Milestones
//     Route::apiResource('milestones', 'MilestonesApiController');

//     // Bugs
//     Route::post('bugs/media', 'BugsApiController@storeMedia')->name('bugs.storeMedia');
//     Route::apiResource('bugs', 'BugsApiController');

//     // Tickets
//     Route::post('tickets/media', 'TicketsApiController@storeMedia')->name('tickets.storeMedia');
//     Route::apiResource('tickets', 'TicketsApiController');

//     // Announcements
//     Route::post('announcements/media', 'AnnouncementsApiController@storeMedia')->name('announcements.storeMedia');
//     Route::apiResource('announcements', 'AnnouncementsApiController');

//     // Kb Categories
//     Route::post('kb-categories/media', 'KbCategoriesApiController@storeMedia')->name('kb-categories.storeMedia');
//     Route::apiResource('kb-categories', 'KbCategoriesApiController', ['except' => ['show', 'update']]);

//     // Customer Groups
//     Route::post('customer-groups/media', 'CustomerGroupsApiController@storeMedia')->name('customer-groups.storeMedia');
//     Route::apiResource('customer-groups', 'CustomerGroupsApiController');

//     // Invoices
//     Route::post('invoices/media', 'InvoicesApiController@storeMedia')->name('invoices.storeMedia');
//     Route::apiResource('invoices', 'InvoicesApiController');

//     // Proposals Items
//     Route::post('proposals-items/media', 'ProposalsItemsApiController@storeMedia')->name('proposals-items.storeMedia');
//     Route::apiResource('proposals-items', 'ProposalsItemsApiController');

//     // Suppliers
//     Route::apiResource('suppliers', 'SuppliersApiController');

//     // Purchases
//     Route::post('purchases/media', 'PurchaseApiController@storeMedia')->name('purchases.storeMedia');
//     Route::apiResource('purchases', 'PurchaseApiController');

//     // Return Stocks
//     Route::post('return-stocks/media', 'ReturnStockApiController@storeMedia')->name('return-stocks.storeMedia');
//     Route::apiResource('return-stocks', 'ReturnStockApiController');

//     // Purchase Payments
//     Route::post('purchase-payments/media', 'PurchasePaymentsApiController@storeMedia')->name('purchase-payments.storeMedia');
//     Route::apiResource('purchase-payments', 'PurchasePaymentsApiController');

//     // Payment Methods
//     Route::apiResource('payment-methods', 'PaymentMethodsApiController', ['except' => ['show', 'update']]);

//     // Payments
//     Route::post('payments/media', 'PaymentsApiController@storeMedia')->name('payments.storeMedia');
//     Route::apiResource('payments', 'PaymentsApiController');

//     // Transactions
//     Route::post('transactions/media', 'TransactionsApiController@storeMedia')->name('transactions.storeMedia');
//     Route::apiResource('transactions', 'TransactionsApiController');

//     // Transfers
//     Route::post('transfers/media', 'TransfersApiController@storeMedia')->name('transfers.storeMedia');
//     Route::apiResource('transfers', 'TransfersApiController');

//     // Employee Banks
//     Route::apiResource('employee-banks', 'EmployeeBankApiController');

//     // Tax Rates
//     Route::apiResource('tax-rates', 'TaxRatesApiController');

//     // Stock Categories
//     Route::apiResource('stock-categories', 'StockCategoriesApiController', ['except' => ['show', 'update']]);

//     // Stock Sub Categories
//     Route::apiResource('stock-sub-categories', 'StockSubCategoriesApiController', ['except' => ['show', 'update']]);

//     // Stocks
//     Route::apiResource('stocks', 'StocksApiController', ['except' => ['show']]);

//     // Advance Salaries
//     Route::post('advance-salaries/media', 'AdvanceSalaryApiController@storeMedia')->name('advance-salaries.storeMedia');
//     Route::apiResource('advance-salaries', 'AdvanceSalaryApiController');

//     // Salary Allowances
//     Route::apiResource('salary-allowances', 'salaryAllowanceApiController', ['except' => ['show', 'update']]);

//     // Salary Templates
//     Route::apiResource('salary-templates', 'SalaryTemplateApiController', ['except' => ['show', 'update']]);

//     // Salary Deductions
//     Route::apiResource('salary-deductions', 'SalaryDeductionsApiController', ['except' => ['show', 'update']]);

//     // Salary Payments
//     Route::post('salary-payments/media', 'SalaryPaymentsApiController@storeMedia')->name('salary-payments.storeMedia');
//     Route::apiResource('salary-payments', 'SalaryPaymentsApiController');

//     // Salary Payment Allowances
//     Route::apiResource('salary-payment-allowances', 'SalaryPaymentAllowanceApiController', ['except' => ['show', 'update']]);

//     // Salary Payment Deductions
//     Route::apiResource('salary-payment-deductions', 'SalaryPaymentDeductionsApiController', ['except' => ['show', 'update']]);

//     // Salary Payment Details
//     Route::apiResource('salary-payment-details', 'SalaryPaymentDetailsApiController', ['except' => ['show', 'update']]);

//     // Salary Payslips
//     Route::apiResource('salary-payslips', 'SalaryPayslipApiController');

//     // Hourly Rates
//     Route::apiResource('hourly-rates', 'HourlyRatesApiController', ['except' => ['show', 'update']]);

//     // Online Payments
//     Route::apiResource('online-payments', 'OnlinePaymentsApiController', ['except' => ['show', 'update']]);

//     // Vacations
//     Route::post('vacations/media', 'VacationsApiController@storeMedia')->name('vacations.storeMedia');
//     Route::apiResource('vacations', 'VacationsApiController');

//     // Locals
//     Route::apiResource('locals', 'LocalsApiController', ['except' => ['show', 'update']]);

//     // Files
//     Route::post('files/media', 'FilesApiController@storeMedia')->name('files.storeMedia');
//     Route::apiResource('files', 'FilesApiController', ['except' => ['update']]);

//     // Task Uploaded Files
//     Route::post('task-uploaded-files/media', 'TaskUploadedFilesApiController@storeMedia')->name('task-uploaded-files.storeMedia');
//     Route::apiResource('task-uploaded-files', 'TaskUploadedFilesApiController');

//     // Task Attachments
//     Route::post('task-attachments/media', 'TaskAttachmentsApiController@storeMedia')->name('task-attachments.storeMedia');
//     Route::apiResource('task-attachments', 'TaskAttachmentsApiController');

//     // Penalty Categories
//     Route::apiResource('penalty-categories', 'PenaltyCategoriesApiController', ['except' => ['show', 'update']]);

//     // Private Chats
//     Route::apiResource('private-chats', 'PrivateChatApiController', ['except' => ['show', 'update']]);

//     // Todos
//     Route::apiResource('todos', 'TodosApiController', ['except' => ['show', 'update']]);

//     // Outgoing Emails
//     Route::post('outgoing-emails/media', 'OutgoingEmailsApiController@storeMedia')->name('outgoing-emails.storeMedia');
//     Route::apiResource('outgoing-emails', 'OutgoingEmailsApiController');

//     // Performance Indicators
//     Route::apiResource('performance-indicators', 'PerformanceIndicatorApiController');

//     // Technical Categories
//     Route::apiResource('technical-categories', 'TechnicalCategoriesApiController', ['except' => ['store', 'update', 'destroy']]);

//     // Quotation Forms
//     Route::apiResource('quotation-forms', 'QuotationFormsApiController');

//     // Quotations
//     Route::post('quotations/media', 'QuotationsApiController@storeMedia')->name('quotations.storeMedia');
//     Route::apiResource('quotations', 'QuotationsApiController');

//     // Quotation Details
//     Route::apiResource('quotation-details', 'QuotationDetailsApiController', ['except' => ['show', 'update']]);

//     // Dashboard Settings
//     Route::apiResource('dashboard-settings', 'DashboardSettingsApiController', ['except' => ['show', 'update']]);

//     // Expense Categories
//     Route::apiResource('expense-categories', 'ExpenseCategoryApiController');

//     // Income Categories
//     Route::apiResource('income-categories', 'IncomeCategoryApiController');

//     // Expenses
//     Route::apiResource('expenses', 'ExpenseApiController');

//     // Incomes
//     Route::apiResource('incomes', 'IncomeApiController');
// });
