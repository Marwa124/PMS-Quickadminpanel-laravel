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

Route::prefix('hr')->group(function() {
    Route::get('/', 'HRController@index');
});


Route::get('circular_details/{id}', 'HRController@circularDetails')->name('front.circular_details');
Route::post('front/job-applications/media', 'HRController@storeMedia')->name('front.job-applications.storeMedia');
Route::post('front/job-applications/ckmedia', 'HRController@storeCKEditorImages')->name('front.job-applications.storeCKEditorImages');
Route::get('front/job-applications/create/{id}', 'HRController@jobApplicationCreate')->name('front.job-applications.create');
Route::post('front/job-applications/{id}', 'HRController@jobApplicationStore')->name('front.job-applications.store');


Route::group(['as' => 'hr.admin.', 'prefix' => 'admin/hr', 'namespace' => 'Admin', 'middleware' => ['auth']],function() {

    // Account Details
    Route::delete('account-details/destroy', 'AccountDetailsController@massDestroy')->name('account-details.massDestroy');
    Route::post('account-details/media', 'AccountDetailsController@storeMedia')->name('account-details.storeMedia');
    Route::post('account-details/ckmedia', 'AccountDetailsController@storeCKEditorImages')->name('account-details.storeCKEditorImages');
    Route::post('account-details/password', 'AccountDetailsController@passwordReset')->name('account-details.passwordReset');
    Route::post('account-details/force-destroy/{id}', 'AccountDetailsController@forceDelete')->name('account-details.forceDestroy');
    // Route::get('account-details/filter', 'AccountDetailsController@filterSelect')->name('filter-select'); // For filter soft delete
    Route::post('account-details/advanced-salary/{id}', 'AccountDetailsController@advancedSalary')->name('account-details.advancedSalary'); // For filter soft delete
    Route::resource('account-details', 'AccountDetailsController');

    // Accounts
    Route::delete('accounts/destroy', 'AccountsController@massDestroy')->name('accounts.massDestroy');
    Route::resource('accounts', 'AccountsController');

    //working days
	Route::get('working-days', 'WorkingDayController@index')->name('working-days.index');
    Route::post('working-days/update/', 'WorkingDayController@update')->name('working-days.update');

    // Daily Attendances
    Route::delete('daily-attendances/destroy', 'DailyAttendancesController@massDestroy')->name('daily-attendances.massDestroy');
    Route::resource('daily-attendances', 'DailyAttendancesController', ['except' => ['create', 'edit', 'update', 'destroy']]);

    // Monthly Attendances
    Route::resource('monthly-attendances', 'MonthlyAttendancesController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Requests
    Route::delete('requests/destroy', 'RequestsController@massDestroy')->name('requests.massDestroy');
    Route::resource('requests', 'RequestsController');

    // Employees
    Route::delete('employees/destroy', 'EmployeesController@massDestroy')->name('employees.massDestroy');
    Route::resource('employees', 'EmployeesController');

     // Departments
     Route::delete('departments/destroy', 'DepartmentsController@massDestroy')->name('departments.massDestroy');
     Route::get('departments/designations', 'DepartmentsController@designationsDepartment')->name('departments.designations');
     Route::resource('departments', 'DepartmentsController');

     // Designations
     Route::delete('designations/destroy', 'DesignationsController@massDestroy')->name('designations.massDestroy');
     Route::resource('designations', 'DesignationsController');

     // Overtimes
     Route::delete('overtimes/destroy', 'OvertimeController@massDestroy')->name('overtimes.massDestroy');
     Route::post('overtimes/media', 'OvertimeController@storeMedia')->name('overtimes.storeMedia');
     Route::post('overtimes/ckmedia', 'OvertimeController@storeCKEditorImages')->name('overtimes.storeCKEditorImages');
     Route::resource('overtimes', 'OvertimeController');

     // Holidays
     Route::delete('holidays/destroy', 'HolidaysController@massDestroy')->name('holidays.massDestroy');
     Route::resource('holidays', 'HolidaysController');

     // Set Time
     Route::delete('set-times/destroy', 'SetTimesController@massDestroy')->name('set-times.massDestroy');
     Route::resource('set-times', 'SetTimesController');

     // Trainings
     Route::delete('trainings/destroy', 'TrainingsController@massDestroy')->name('trainings.massDestroy');
     Route::post('trainings/media', 'TrainingsController@storeMedia')->name('trainings.storeMedia');
     Route::post('trainings/ckmedia', 'TrainingsController@storeCKEditorImages')->name('trainings.storeCKEditorImages');
     Route::resource('trainings', 'TrainingsController');

     // Leave Categories
     Route::delete('leave-categories/destroy', 'LeaveCategoriesController@massDestroy')->name('leave-categories.massDestroy');
     Route::resource('leave-categories', 'LeaveCategoriesController');

     // Leave Applications
     Route::delete('leave-applications/destroy', 'LeaveApplicationsController@massDestroy')->name('leave-applications.massDestroy');
     Route::post('leave-applications/force-destroy/{id}', 'LeaveApplicationsController@forceDelete')->name('leave-applications.forceDestroy');
     Route::post('leave-applications/media', 'LeaveApplicationsController@storeMedia')->name('leave-applications.storeMedia');
     Route::post('leave-applications/ckmedia', 'LeaveApplicationsController@storeCKEditorImages')->name('leave-applications.storeCKEditorImages');
     Route::get('leave-applications/details', 'LeaveApplicationsController@details')->name('leave-applications.details');
     Route::get('leave-applications/mark-notification-as-read/{id}', 'LeaveApplicationsController@markNotificationAsRead')->name('leave-applications.markNotificationAsRead');
     Route::get('leave-applications/mark-attendance/{id}', 'LeaveApplicationsController@markAttendance')->name('leave-applications.markAttendance');
     Route::get('leave-applications/approve_reject/{id}/{status}', 'LeaveApplicationsController@approveReject')->name('leave-applications.approveReject');
     Route::resource('leave-applications', 'LeaveApplicationsController', ['except' => ['edit']]);

     // Meeting Minutes
     Route::delete('meeting-minutes/destroy', 'MeetingMinutesController@massDestroy')->name('meeting-minutes.massDestroy');
     Route::post('meeting-minutes/media', 'MeetingMinutesController@storeMedia')->name('meeting-minutes.storeMedia');
     Route::post('meeting-minutes/ckmedia', 'MeetingMinutesController@storeCKEditorImages')->name('meeting-minutes.storeCKEditorImages');
     Route::resource('meeting-minutes', 'MeetingMinutesController');

     // Employee Awards
     Route::delete('employee-awards/destroy', 'EmployeeAwardsController@massDestroy')->name('employee-awards.massDestroy');
     Route::resource('employee-awards', 'EmployeeAwardsController');

     // attendances
     Route::delete('attendances/destroy', 'AttendancesController@massDestroy')->name('attendances.massDestroy');
     Route::resource('attendances', 'AttendancesController');

     // Employee Banks
     Route::delete('employee-banks/destroy', 'EmployeeBankController@massDestroy')->name('employee-banks.massDestroy');
     Route::resource('employee-banks', 'EmployeeBankController');

     // Vacations
     Route::delete('vacations/destroy', 'VacationsController@massDestroy')->name('vacations.massDestroy');
     Route::post('vacations/media', 'VacationsController@storeMedia')->name('vacations.storeMedia');
     Route::post('vacations/ckmedia', 'VacationsController@storeCKEditorImages')->name('vacations.storeCKEditorImages');
     Route::resource('vacations', 'VacationsController');

     // Job Circulars
    Route::delete('job-circulars/destroy', 'JobCircularsController@massDestroy')->name('job-circulars.massDestroy');
    Route::post('job-circulars/media', 'JobCircularsController@storeMedia')->name('job-circulars.storeMedia');
    Route::post('job-circulars/ckmedia', 'JobCircularsController@storeCKEditorImages')->name('job-circulars.storeCKEditorImages');
    Route::get('job-circulars/job-applications/{id}', 'JobCircularsController@listJobApplications')->name('job-circulars.all-job-applications');
    Route::resource('job-circulars', 'JobCircularsController');

    // Job Applications
    Route::delete('job-applications/destroy', 'JobApplicationController@massDestroy')->name('job-applications.massDestroy');
    // Route::post('job-applications/media', 'JobApplicationController@storeMedia')->name('job-applications.storeMedia');
    // Route::post('job-applications/ckmedia', 'JobApplicationController@storeCKEditorImages')->name('job-applications.storeCKEditorImages');
    Route::resource('job-applications', 'JobApplicationController', ['except' => ['store', 'create']]);

});
