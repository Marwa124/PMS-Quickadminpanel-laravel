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

Route::prefix('projectmanagement')->group(function() {
    Route::get('/', 'ProjectManagementController@index');
});
//Route::group([ 'namespace' => 'Admin'], function () {
//
//    Route::get('employees','SubDepartmentController@get_employees')->name('sub-department.get_employees');
//});
Route::group(['prefix' => 'admin/projectmanagement', 'as' => 'projectmanagement.admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {


    // Task Statuses
    Route::delete('task-statuses/destroy', 'TaskStatusController@massDestroy')->name('task-statuses.massDestroy');
    Route::resource('task-statuses', 'TaskStatusController');
    Route::get('task-statuses/index/trashed','TaskStatusController@index')->name('task-statuses.trashed.index');
    Route::post('task-statuses/{id}/force-destroy', 'TaskStatusController@forceDelete')->name('task-statuses.forceDestroy');

    // Task Tags
    Route::delete('task-tags/destroy', 'TaskTagController@massDestroy')->name('task-tags.massDestroy');
    Route::resource('task-tags', 'TaskTagController');
    Route::get('task-tags/index/trashed','TaskTagController@index')->name('task-tags.trashed.index');
    Route::post('task-tags/{id}/force-destroy', 'TaskTagController@forceDelete')->name('task-tags.forceDestroy');

    // Tasks
    Route::delete('tasks/destroy', 'TaskController@massDestroy')->name('tasks.massDestroy');
    Route::post('tasks/media', 'TaskController@storeMedia')->name('tasks.storeMedia');
    Route::post('tasks/ckmedia', 'TaskController@storeCKEditorImages')->name('tasks.storeCKEditorImages');
    Route::resource('tasks', 'TaskController');
    Route::get('tasks/index/trashed','TaskController@index')->name('tasks.trashed.index');
    Route::get('tasks/{id}/assign_to','TaskController@getAssignTo')->name('tasks.getAssignTo');
    Route::post('tasks/assign_to','TaskController@storeAssignTo')->name('tasks.storeAssignTo');
    Route::put('tasks/{id}/update_note','TaskController@update_note')->name('tasks.update_note');
    Route::get('tasks/create/sub-task/{id}','TaskController@create')->name('tasks.create_sub_task');
    Route::get('tasks/create/milestone-task/{id}','TaskController@create')->name('tasks.create_milestone_task');
    Route::get('tasks/create/project-task/{id}','TaskController@create')->name('tasks.create_project_task');
    Route::get('tasks/{id}/task_timer','TaskController@update_task_timer')->name('tasks.update_task_timer');
    Route::get('tasks/{id}/clone','TaskController@task_clone')->name('tasks.clone');
    Route::post('tasks/{id}/force-destroy', 'TaskController@forceDelete')->name('tasks.forceDestroy');


    // Tasks Calendars
    Route::resource('tasks-calendars', 'TasksCalendarController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectsController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectsController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::resource('projects', 'ProjectsController');
    Route::get('projects/{id}/assign_to','ProjectsController@getAssignTo')->name('projects.getAssignTo');
    Route::post('projects/assign_to','ProjectsController@storeAssignTo')->name('projects.storeAssignTo');
    Route::put('projects/{id}/update_note','ProjectsController@update_note')->name('projects.update_note');
    Route::get('projects/{id}/project_timer','ProjectsController@update_project_timer')->name('projects.update_project_timer');
    Route::get('projects/{id}/project_pdf','ProjectsController@project_pdf')->name('projects.project_pdf');
    Route::get('projects/{id}/clone','ProjectsController@project_clone')->name('projects.clone');
    Route::get('projects/index/trashed','ProjectsController@index')->name('projects.trashed.index');
    Route::post('projects/{id}/force-destroy', 'ProjectsController@forceDelete')->name('projects.forceDestroy');


    // Milestones
    Route::delete('milestones/destroy', 'MilestonesController@massDestroy')->name('milestones.massDestroy');
    Route::resource('milestones', 'MilestonesController');
    Route::get('milestones/index/trashed','MilestonesController@index')->name('milestones.trashed.index');
    Route::get('milestones/{id}/assign_to','MilestonesController@getAssignTo')->name('milestones.getAssignTo');
    Route::post('milestones/assign_to','MilestonesController@storeAssignTo')->name('milestones.storeAssignTo');
    Route::post('milestones/{id}/force-destroy', 'MilestonesController@forceDelete')->name('milestones.forceDestroy');
    Route::delete('milestones/force-destroy', 'MilestonesController@massforceDelete')->name('milestones.massForceDestroy');
    Route::get('milestones/create/project-milestone/{id}','MilestonesController@create')->name('milestones.create_project_milestone');

    // Bugs
    Route::delete('bugs/destroy', 'BugsController@massDestroy')->name('bugs.massDestroy');
    Route::post('bugs/media', 'BugsController@storeMedia')->name('bugs.storeMedia');
    Route::post('bugs/ckmedia', 'BugsController@storeCKEditorImages')->name('bugs.storeCKEditorImages');
    Route::resource('bugs', 'BugsController');
    Route::get('bugs/{id}/assign_to','BugsController@getAssignTo')->name('bugs.getAssignTo');
    Route::post('bugs/assign_to','BugsController@storeAssignTo')->name('bugs.storeAssignTo');
    Route::put('bugs/{id}/update_note','BugsController@update_note')->name('bugs.update_note');
    Route::get('bugs/create/project-bug/{id}','BugsController@create')->name('bugs.create_project_bug');
    Route::get('bugs/create/task-bug/{id}','BugsController@create')->name('bugs.create_task_bug');
    Route::get('bugs/index/trashed','BugsController@index')->name('bugs.trashed.index');
    Route::post('bugs/{id}/force-destroy', 'BugsController@forceDelete')->name('bugs.forceDestroy');

    // Tickets
    Route::delete('tickets/destroy', 'TicketsController@massDestroy')->name('tickets.massDestroy');
    Route::post('tickets/media', 'TicketsController@storeMedia')->name('tickets.storeMedia');
    Route::post('tickets/ckmedia', 'TicketsController@storeCKEditorImages')->name('tickets.storeCKEditorImages');
    Route::resource('tickets', 'TicketsController');
    Route::get('tickets/{id}/assign_to','TicketsController@getAssignTo')->name('tickets.getAssignTo');
    Route::post('tickets/assign_to','TicketsController@storeAssignTo')->name('tickets.storeAssignTo');
    Route::get('tickets/create/project-ticket/{id}','TicketsController@create')->name('tickets.create_project_ticket');
    Route::post('tickets/add_replay','TicketsController@replay')->name('tickets.replay');
    Route::post('tickets/change_status','TicketsController@change_status')->name('tickets.change_status');
    Route::get('tickets/index/trashed','TicketsController@index')->name('tickets.trashed.index');
    Route::post('tickets/{id}/force-destroy', 'TicketsController@forceDelete')->name('tickets.forceDestroy');
    //Route::post('close_ticket','TicketsController@close')->name('tickets.close');
    //Route::get('changestatus/{status}/{id}','TicketController@change_status')->name('tickets.change_status');

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


    // Time Sheet

    Route::resource('time-sheets', 'TimeSheetController')->only(['store','destroy']);
//    Route::get('employees','SubDepartmentController@get_employees')->name('sub-department.get_employees');

//    //Project Specifications sub-department (values)
//    Route::delete('project_specification_departments/destroy', 'ProjectSpecificationDepartmentController@massDestroy')->name('project_specification_departments.massDestroy');
//    Route::resource('project_specification_departments', 'ProjectSpecificationDepartmentController');

    // Work Trackings
    Route::delete('work-trackings/destroy', 'WorkTrackingController@massDestroy')->name('work-trackings.massDestroy');
    Route::resource('work-trackings', 'WorkTrackingController');
    Route::get('work-trackings/index/trashed','WorkTrackingController@index')->name('work-trackings.trashed.index');
    Route::post('work-trackings/{id}/force-destroy', 'WorkTrackingController@forceDelete')->name('work-trackings.forceDestroy');

    // Time Work Types
    Route::delete('time-work-types/destroy', 'TimeWorkTypeController@massDestroy')->name('time-work-types.massDestroy');
    Route::post('time-work-types/media', 'TimeWorkTypeController@storeMedia')->name('time-work-types.storeMedia');
    Route::post('time-work-types/ckmedia', 'TimeWorkTypeController@storeCKEditorImages')->name('time-work-types.storeCKEditorImages');
    Route::resource('time-work-types', 'TimeWorkTypeController');
    Route::get('time-work-types/index/trashed','TimeWorkTypeController@index')->name('time-work-types.trashed.index');
    Route::post('time-work-types/{id}/force-destroy', 'TimeWorkTypeController@forceDelete')->name('time-work-types.forceDestroy');
});
