<?php

Route::redirect('/', '/login');
// Route::get('/home', function () {
//     if (session('status')) {
//         return redirect()->route('admin.home')->with('status', session('status'));
//     }

//     return redirect()->route('admin.home');
// });


Route::get('user/upload','ImportsController@user');
Route::Post('user/upload','ImportsController@storeUser');


Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::get('permissions/{id}', 'PermissionsController@index')->name('permissions.index');
    // Route::resource('permissions', 'PermissionsController');






        
    /**************** permissions *****************/

    // roles
    // Route::apiResource('roles', 'AclController')->parameters(['roles' => 'id']);
    Route::resource('roles', 'AclController')->parameters(['roles' => 'id']);
    Route::get('/name_roles', 'AclController@getNameRoles');

    // permissions
    Route::get('/permissions', 'AclController@getListPermissions');

    // user
    Route::get('/roles_permissions_for_user/{id}', 'AclController@getRolesAndPermissionsForUser');
    Route::put('/assign_to_user/{id}', 'AclController@assignToUser');

    Route::get('/users_list', 'AclController@getUsersList');

    /*********************************************************************************/








    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Crm Statuses
    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');
    Route::resource('crm-statuses', 'CrmStatusController', ['except' => ['edit', 'update', 'show']]);

    // Crm Customers
    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');
    Route::resource('crm-customers', 'CrmCustomerController');

    // Crm Notes
    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');
    Route::resource('crm-notes', 'CrmNoteController');

    // Crm Documents
    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');
    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');
    Route::post('crm-documents/ckmedia', 'CrmDocumentController@storeCKEditorImages')->name('crm-documents.storeCKEditorImages');
    Route::resource('crm-documents', 'CrmDocumentController');

    // Time Work Types
    Route::delete('time-work-types/destroy', 'TimeWorkTypeController@massDestroy')->name('time-work-types.massDestroy');
    Route::post('time-work-types/media', 'TimeWorkTypeController@storeMedia')->name('time-work-types.storeMedia');
    Route::post('time-work-types/ckmedia', 'TimeWorkTypeController@storeCKEditorImages')->name('time-work-types.storeCKEditorImages');
    Route::resource('time-work-types', 'TimeWorkTypeController');

    // Time Projects
    Route::delete('time-projects/destroy', 'TimeProjectController@massDestroy')->name('time-projects.massDestroy');
    Route::resource('time-projects', 'TimeProjectController');

    // Time Entries
    Route::delete('time-entries/destroy', 'TimeEntryController@massDestroy')->name('time-entries.massDestroy');
    Route::resource('time-entries', 'TimeEntryController');

    // Time Reports
    Route::delete('time-reports/destroy', 'TimeReportController@massDestroy')->name('time-reports.massDestroy');
    Route::resource('time-reports', 'TimeReportController');

    // Task Statuses
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');

    // Task Tags
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');

    // Tasks
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');

    // Tasks Calendars
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Account Details
    // Route::delete('account-details/destroy', 'AccountDetailsController@massDestroy')->name('account-details.massDestroy');
    // Route::post('account-details/media', 'AccountDetailsController@storeMedia')->name('account-details.storeMedia');
    // Route::post('account-details/ckmedia', 'AccountDetailsController@storeCKEditorImages')->name('account-details.storeCKEditorImages');
    // Route::post('account-details/password', 'AccountDetailsController@passwordReset')->name('account-details.passwordReset');
    // Route::get('account-details/filter', 'AccountDetailsController@filterSelect')->name('filter-select');
    // Route::resource('account-details', 'AccountDetailsController');

    // Proposals
    Route::delete('proposals/destroy', 'ProposalsController@massDestroy')->name('proposals.massDestroy');
    Route::post('proposals/media', 'ProposalsController@storeMedia')->name('proposals.storeMedia');
    Route::post('proposals/ckmedia', 'ProposalsController@storeCKEditorImages')->name('proposals.storeCKEditorImages');
    Route::resource('proposals', 'ProposalsController');

    // Interested Ins
    Route::delete('interested-ins/destroy', 'InterestedInController@massDestroy')->name('interested-ins.massDestroy');
    Route::resource('interested-ins', 'InterestedInController', ['except' => ['edit', 'update', 'show']]);

    // Lead Categories
    Route::delete('lead-categories/destroy', 'LeadCategoriesController@massDestroy')->name('lead-categories.massDestroy');
    Route::resource('lead-categories', 'LeadCategoriesController');

    // Lead Sources
    Route::delete('lead-sources/destroy', 'LeadSourcesController@massDestroy')->name('lead-sources.massDestroy');
    Route::resource('lead-sources', 'LeadSourcesController', ['except' => ['edit', 'update', 'show']]);

    // Lead Statuses
    Route::delete('lead-statuses/destroy', 'LeadStatusController@massDestroy')->name('lead-statuses.massDestroy');
    Route::resource('lead-statuses', 'LeadStatusController', ['except' => ['edit', 'update', 'show']]);

    // Salutations
    Route::delete('salutations/destroy', 'SalutationsController@massDestroy')->name('salutations.massDestroy');
    Route::resource('salutations', 'SalutationsController', ['except' => ['edit', 'update', 'show']]);

    // Leads
    Route::delete('leads/destroy', 'LeadsController@massDestroy')->name('leads.massDestroy');
    Route::post('leads/media', 'LeadsController@storeMedia')->name('leads.storeMedia');
    Route::post('leads/ckmedia', 'LeadsController@storeCKEditorImages')->name('leads.storeCKEditorImages');
    Route::resource('leads', 'LeadsController');

    // Opportunities
    Route::delete('opportunities/destroy', 'OpportunitiesController@massDestroy')->name('opportunities.massDestroy');
    Route::post('opportunities/media', 'OpportunitiesController@storeMedia')->name('opportunities.storeMedia');
    Route::post('opportunities/ckmedia', 'OpportunitiesController@storeCKEditorImages')->name('opportunities.storeCKEditorImages');
    Route::resource('opportunities', 'OpportunitiesController');

    // Clients
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::post('clients/media', 'ClientsController@storeMedia')->name('clients.storeMedia');
    Route::post('clients/ckmedia', 'ClientsController@storeCKEditorImages')->name('clients.storeCKEditorImages');
    Route::resource('clients', 'ClientsController');

    // Client Menus
    Route::delete('client-menus/destroy', 'ClientMenuController@massDestroy')->name('client-menus.massDestroy');
    Route::resource('client-menus', 'ClientMenuController');

    // Menus
    Route::delete('menus/destroy', 'MenuController@massDestroy')->name('menus.massDestroy');
    Route::resource('menus', 'MenuController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectsController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectsController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::resource('projects', 'ProjectsController');

    // Project Settings
    Route::delete('project-settings/destroy', 'ProjectSettingsController@massDestroy')->name('project-settings.massDestroy');
    Route::resource('project-settings', 'ProjectSettingsController', ['except' => ['edit', 'update', 'show']]);

    // Work Trackings
    Route::delete('work-trackings/destroy', 'WorkTrackingController@massDestroy')->name('work-trackings.massDestroy');
    Route::resource('work-trackings', 'WorkTrackingController');

    // Accounts
    // Route::delete('accounts/destroy', 'AccountsController@massDestroy')->name('accounts.massDestroy');
    // Route::resource('accounts', 'AccountsController');

    // Milestones
    Route::delete('milestones/destroy', 'MilestonesController@massDestroy')->name('milestones.massDestroy');
    Route::resource('milestones', 'MilestonesController');

    // Bugs
    Route::delete('bugs/destroy', 'BugsController@massDestroy')->name('bugs.massDestroy');
    Route::post('bugs/media', 'BugsController@storeMedia')->name('bugs.storeMedia');
    Route::post('bugs/ckmedia', 'BugsController@storeCKEditorImages')->name('bugs.storeCKEditorImages');
    Route::resource('bugs', 'BugsController');

    // Tickets
    Route::delete('tickets/destroy', 'TicketsController@massDestroy')->name('tickets.massDestroy');
    Route::post('tickets/media', 'TicketsController@storeMedia')->name('tickets.storeMedia');
    Route::post('tickets/ckmedia', 'TicketsController@storeCKEditorImages')->name('tickets.storeCKEditorImages');
    Route::resource('tickets', 'TicketsController');

    // Announcements
    Route::delete('announcements/destroy', 'AnnouncementsController@massDestroy')->name('announcements.massDestroy');
    Route::post('announcements/media', 'AnnouncementsController@storeMedia')->name('announcements.storeMedia');
    Route::post('announcements/ckmedia', 'AnnouncementsController@storeCKEditorImages')->name('announcements.storeCKEditorImages');
    Route::resource('announcements', 'AnnouncementsController');

    // Kb Categories
    Route::delete('kb-categories/destroy', 'KbCategoriesController@massDestroy')->name('kb-categories.massDestroy');
    Route::post('kb-categories/media', 'KbCategoriesController@storeMedia')->name('kb-categories.storeMedia');
    Route::post('kb-categories/ckmedia', 'KbCategoriesController@storeCKEditorImages')->name('kb-categories.storeCKEditorImages');
    Route::resource('kb-categories', 'KbCategoriesController', ['except' => ['edit', 'update', 'show']]);

    // Customer Groups
    Route::delete('customer-groups/destroy', 'CustomerGroupsController@massDestroy')->name('customer-groups.massDestroy');
    Route::post('customer-groups/media', 'CustomerGroupsController@storeMedia')->name('customer-groups.storeMedia');
    Route::post('customer-groups/ckmedia', 'CustomerGroupsController@storeCKEditorImages')->name('customer-groups.storeCKEditorImages');
    Route::resource('customer-groups', 'CustomerGroupsController');

    // Invoices
    Route::delete('invoices/destroy', 'InvoicesController@massDestroy')->name('invoices.massDestroy');
    Route::post('invoices/media', 'InvoicesController@storeMedia')->name('invoices.storeMedia');
    Route::post('invoices/ckmedia', 'InvoicesController@storeCKEditorImages')->name('invoices.storeCKEditorImages');
    Route::resource('invoices', 'InvoicesController');

    // Proposals Items
    Route::delete('proposals-items/destroy', 'ProposalsItemsController@massDestroy')->name('proposals-items.massDestroy');
    Route::post('proposals-items/media', 'ProposalsItemsController@storeMedia')->name('proposals-items.storeMedia');
    Route::post('proposals-items/ckmedia', 'ProposalsItemsController@storeCKEditorImages')->name('proposals-items.storeCKEditorImages');
    Route::resource('proposals-items', 'ProposalsItemsController');

    // Suppliers
    Route::delete('suppliers/destroy', 'SuppliersController@massDestroy')->name('suppliers.massDestroy');
    Route::resource('suppliers', 'SuppliersController');

    // Purchases
    Route::delete('purchases/destroy', 'PurchaseController@massDestroy')->name('purchases.massDestroy');
    Route::post('purchases/media', 'PurchaseController@storeMedia')->name('purchases.storeMedia');
    Route::post('purchases/ckmedia', 'PurchaseController@storeCKEditorImages')->name('purchases.storeCKEditorImages');
    Route::resource('purchases', 'PurchaseController');

    // Return Stocks
    Route::delete('return-stocks/destroy', 'ReturnStockController@massDestroy')->name('return-stocks.massDestroy');
    Route::post('return-stocks/media', 'ReturnStockController@storeMedia')->name('return-stocks.storeMedia');
    Route::post('return-stocks/ckmedia', 'ReturnStockController@storeCKEditorImages')->name('return-stocks.storeCKEditorImages');
    Route::resource('return-stocks', 'ReturnStockController');

    // Purchase Payments
    Route::delete('purchase-payments/destroy', 'PurchasePaymentsController@massDestroy')->name('purchase-payments.massDestroy');
    Route::post('purchase-payments/media', 'PurchasePaymentsController@storeMedia')->name('purchase-payments.storeMedia');
    Route::post('purchase-payments/ckmedia', 'PurchasePaymentsController@storeCKEditorImages')->name('purchase-payments.storeCKEditorImages');
    Route::resource('purchase-payments', 'PurchasePaymentsController');

    // Payment Methods
    Route::delete('payment-methods/destroy', 'PaymentMethodsController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodsController', ['except' => ['edit', 'update', 'show']]);

    // Payments
    Route::delete('payments/destroy', 'PaymentsController@massDestroy')->name('payments.massDestroy');
    Route::post('payments/media', 'PaymentsController@storeMedia')->name('payments.storeMedia');
    Route::post('payments/ckmedia', 'PaymentsController@storeCKEditorImages')->name('payments.storeCKEditorImages');
    Route::resource('payments', 'PaymentsController');

    // Transactions
    Route::delete('transactions/destroy', 'TransactionsController@massDestroy')->name('transactions.massDestroy');
    Route::post('transactions/media', 'TransactionsController@storeMedia')->name('transactions.storeMedia');
    Route::post('transactions/ckmedia', 'TransactionsController@storeCKEditorImages')->name('transactions.storeCKEditorImages');
    Route::resource('transactions', 'TransactionsController');

    // Transfers
    Route::delete('transfers/destroy', 'TransfersController@massDestroy')->name('transfers.massDestroy');
    Route::post('transfers/media', 'TransfersController@storeMedia')->name('transfers.storeMedia');
    Route::post('transfers/ckmedia', 'TransfersController@storeCKEditorImages')->name('transfers.storeCKEditorImages');
    Route::resource('transfers', 'TransfersController');

    // Tax Rates
    Route::delete('tax-rates/destroy', 'TaxRatesController@massDestroy')->name('tax-rates.massDestroy');
    Route::resource('tax-rates', 'TaxRatesController');

    // Stock Categories
    Route::delete('stock-categories/destroy', 'StockCategoriesController@massDestroy')->name('stock-categories.massDestroy');
    Route::resource('stock-categories', 'StockCategoriesController', ['except' => ['edit', 'update', 'show']]);

    // Stock Sub Categories
    Route::delete('stock-sub-categories/destroy', 'StockSubCategoriesController@massDestroy')->name('stock-sub-categories.massDestroy');
    Route::resource('stock-sub-categories', 'StockSubCategoriesController', ['except' => ['edit', 'update', 'show']]);

    // Stocks
    Route::delete('stocks/destroy', 'StocksController@massDestroy')->name('stocks.massDestroy');
    Route::resource('stocks', 'StocksController', ['except' => ['show']]);

    // Online Payments
    Route::delete('online-payments/destroy', 'OnlinePaymentsController@massDestroy')->name('online-payments.massDestroy');
    Route::resource('online-payments', 'OnlinePaymentsController', ['except' => ['edit', 'update', 'show']]);

    // Locals
    Route::delete('locals/destroy', 'LocalsController@massDestroy')->name('locals.massDestroy');
    Route::resource('locals', 'LocalsController', ['except' => ['edit', 'update', 'show']]);

    // Files
    Route::delete('files/destroy', 'FilesController@massDestroy')->name('files.massDestroy');
    Route::post('files/media', 'FilesController@storeMedia')->name('files.storeMedia');
    Route::post('files/ckmedia', 'FilesController@storeCKEditorImages')->name('files.storeCKEditorImages');
    Route::resource('files', 'FilesController', ['except' => ['edit', 'update']]);

    // Task Uploaded Files
    Route::delete('task-uploaded-files/destroy', 'TaskUploadedFilesController@massDestroy')->name('task-uploaded-files.massDestroy');
    Route::post('task-uploaded-files/media', 'TaskUploadedFilesController@storeMedia')->name('task-uploaded-files.storeMedia');
    Route::post('task-uploaded-files/ckmedia', 'TaskUploadedFilesController@storeCKEditorImages')->name('task-uploaded-files.storeCKEditorImages');
    Route::resource('task-uploaded-files', 'TaskUploadedFilesController');

    // Task Attachments
    Route::delete('task-attachments/destroy', 'TaskAttachmentsController@massDestroy')->name('task-attachments.massDestroy');
    Route::post('task-attachments/media', 'TaskAttachmentsController@storeMedia')->name('task-attachments.storeMedia');
    Route::post('task-attachments/ckmedia', 'TaskAttachmentsController@storeCKEditorImages')->name('task-attachments.storeCKEditorImages');
    Route::resource('task-attachments', 'TaskAttachmentsController');

    // Penalty Categories
    Route::delete('penalty-categories/destroy', 'PenaltyCategoriesController@massDestroy')->name('penalty-categories.massDestroy');
    Route::resource('penalty-categories', 'PenaltyCategoriesController', ['except' => ['edit', 'update', 'show']]);

    // Private Chats
    Route::delete('private-chats/destroy', 'PrivateChatController@massDestroy')->name('private-chats.massDestroy');
    Route::resource('private-chats', 'PrivateChatController', ['except' => ['edit', 'update', 'show']]);

    // Todos
    Route::delete('todos/destroy', 'TodosController@massDestroy')->name('todos.massDestroy');
    Route::resource('todos', 'TodosController', ['except' => ['edit', 'update', 'show']]);

    // Outgoing Emails
    Route::delete('outgoing-emails/destroy', 'OutgoingEmailsController@massDestroy')->name('outgoing-emails.massDestroy');
    Route::post('outgoing-emails/media', 'OutgoingEmailsController@storeMedia')->name('outgoing-emails.storeMedia');
    Route::post('outgoing-emails/ckmedia', 'OutgoingEmailsController@storeCKEditorImages')->name('outgoing-emails.storeCKEditorImages');
    Route::resource('outgoing-emails', 'OutgoingEmailsController');

    // Performance Indicators
    Route::delete('performance-indicators/destroy', 'PerformanceIndicatorController@massDestroy')->name('performance-indicators.massDestroy');
    Route::resource('performance-indicators', 'PerformanceIndicatorController');

    // Technical Categories
    Route::resource('technical-categories', 'TechnicalCategoriesController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Quotation Forms
    Route::delete('quotation-forms/destroy', 'QuotationFormsController@massDestroy')->name('quotation-forms.massDestroy');
    Route::resource('quotation-forms', 'QuotationFormsController');

    // Quotations
    Route::delete('quotations/destroy', 'QuotationsController@massDestroy')->name('quotations.massDestroy');
    Route::post('quotations/media', 'QuotationsController@storeMedia')->name('quotations.storeMedia');
    Route::post('quotations/ckmedia', 'QuotationsController@storeCKEditorImages')->name('quotations.storeCKEditorImages');
    Route::resource('quotations', 'QuotationsController');

    // Quotation Details
    Route::delete('quotation-details/destroy', 'QuotationDetailsController@massDestroy')->name('quotation-details.massDestroy');
    Route::resource('quotation-details', 'QuotationDetailsController', ['except' => ['edit', 'update', 'show']]);

    // Dashboard Settings
    Route::delete('dashboard-settings/destroy', 'DashboardSettingsController@massDestroy')->name('dashboard-settings.massDestroy');
    Route::resource('dashboard-settings', 'DashboardSettingsController', ['except' => ['edit', 'update', 'show']]);

    // Expense Categories
    Route::delete('expense-categories/destroy', 'ExpenseCategoryController@massDestroy')->name('expense-categories.massDestroy');
    Route::resource('expense-categories', 'ExpenseCategoryController');

    // Income Categories
    Route::delete('income-categories/destroy', 'IncomeCategoryController@massDestroy')->name('income-categories.massDestroy');
    Route::resource('income-categories', 'IncomeCategoryController');

    // Expenses
    Route::delete('expenses/destroy', 'ExpenseController@massDestroy')->name('expenses.massDestroy');
    Route::resource('expenses', 'ExpenseController');

    // Incomes
    Route::delete('incomes/destroy', 'IncomeController@massDestroy')->name('incomes.massDestroy');
    Route::resource('incomes', 'IncomeController');

    // Expense Reports
    Route::delete('expense-reports/destroy', 'ExpenseReportController@massDestroy')->name('expense-reports.massDestroy');
    Route::resource('expense-reports', 'ExpenseReportController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});



// Route::get('/{any}', function(){
//     return view('welcome');
// })->where('any', '.*');
