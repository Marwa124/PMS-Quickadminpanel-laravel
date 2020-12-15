<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::prefix('payroll')->group(function() {
// });

Route::group(['as' => 'payroll.admin.', 'prefix' => 'admin/payroll', 'namespace' => 'Admin', 'middleware' => ['auth']],function() {

    Route::get('/', 'PayrollController@index');

// Advance Salaries
Route::delete('advance-salaries/destroy', 'AdvanceSalaryController@massDestroy')->name('advance-salaries.massDestroy');
Route::post('advance-salaries/media', 'AdvanceSalaryController@storeMedia')->name('advance-salaries.storeMedia');
Route::post('advance-salaries/ckmedia', 'AdvanceSalaryController@storeCKEditorImages')->name('advance-salaries.storeCKEditorImages');
Route::resource('advance-salaries', 'AdvanceSalaryController');


 // Payment Methods
Route::delete('payment-methods/destroy', 'PaymentMethodsController@massDestroy')->name('payment-methods.massDestroy');
Route::resource('payment-methods', 'PaymentMethodsController', ['except' => ['edit', 'update', 'show']]);

// Payments
Route::delete('payments/destroy', 'PaymentsController@massDestroy')->name('payments.massDestroy');
Route::post('payments/media', 'PaymentsController@storeMedia')->name('payments.storeMedia');
Route::post('payments/ckmedia', 'PaymentsController@storeCKEditorImages')->name('payments.storeCKEditorImages');
Route::resource('payments', 'PaymentsController');

// Dalary Allowances
Route::delete('salary-allowances/destroy', 'SalaryAllowanceController@massDestroy')->name('salary-allowances.massDestroy');
Route::resource('salary-allowances', 'SalaryAllowanceController', ['except' => ['edit', 'update', 'show']]);

// Route::get('generate-pdf','SalaryTemplateController@generatePDF');

// Salary Templates
Route::delete('salary-templates/destroy', 'SalaryTemplateController@massDestroy')->name('salary-templates.massDestroy');
Route::resource('salary-templates', 'SalaryTemplateController');
// Route::resource('salary-templates', 'SalaryTemplateController', ['except' => ['edit', 'update', 'show']]);

// Salary Deductions
Route::delete('salary-deductions/destroy', 'SalaryDeductionsController@massDestroy')->name('salary-deductions.massDestroy');
Route::resource('salary-deductions', 'SalaryDeductionsController', ['except' => ['edit', 'update', 'show']]);

// Salary Payments
// Route::delete('salary-payments/destroy', 'SalaryPaymentsController@massDestroy')->name('salary-payments.massDestroy');
// Route::post('salary-payments/media', 'SalaryPaymentsController@storeMedia')->name('salary-payments.storeMedia');
// Route::post('salary-payments/ckmedia', 'SalaryPaymentsController@storeCKEditorImages')->name('salary-payments.storeCKEditorImages');
Route::get('salary-payments/payslip-generate', 'SalaryPaymentsController@payslipGenerate')->name('salary-payments.payslipGenerate');
Route::resource('salary-payments', 'SalaryPaymentsController', ['except' => ['edit', 'update', 'show', 'destroy']]);

// Payroll Summary
Route::get('payroll-summary', 'PayrollSummaryController@__invoke')->name('payroll-summary');

// Salary Payment Allowances
Route::delete('salary-payment-allowances/destroy', 'SalaryPaymentAllowanceController@massDestroy')->name('salary-payment-allowances.massDestroy');
Route::resource('salary-payment-allowances', 'SalaryPaymentAllowanceController', ['except' => ['edit', 'update', 'show']]);

// Salary Payment Deductions
Route::delete('salary-payment-deductions/destroy', 'SalaryPaymentDeductionsController@massDestroy')->name('salary-payment-deductions.massDestroy');
Route::resource('salary-payment-deductions', 'SalaryPaymentDeductionsController', ['except' => ['edit', 'update', 'show']]);

// Salary Payment Details
Route::get('salary-employee-details-pdf/{id}','SalaryPaymentDetailsController@generatePDF')->name('salary-employee-details-pdf');
Route::get('salary-employee-details-print/{id}','SalaryPaymentDetailsController@printDetails')->name('salary-employee-details-print');

Route::delete('salary-payment-details/destroy', 'SalaryPaymentDetailsController@massDestroy')->name('salary-payment-details.massDestroy');
Route::resource('salary-payment-details', 'SalaryPaymentDetailsController', ['except' => ['edit', 'update', 'show']]);

// Salary Payslips
Route::delete('salary-payslips/destroy', 'SalaryPayslipController@massDestroy')->name('salary-payslips.massDestroy');
Route::resource('salary-payslips', 'SalaryPayslipController');

// Hourly Rates
Route::delete('hourly-rates/destroy', 'HourlyRatesController@massDestroy')->name('hourly-rates.massDestroy');
Route::resource('hourly-rates', 'HourlyRatesController', ['except' => ['edit', 'update', 'show']]);

});
