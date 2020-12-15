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

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectsController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectsController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::resource('projects', 'ProjectsController');
    Route::get('projects/assign_to/{id}','ProjectsController@getAssignTo')->name('projects.getAssignTo');
    Route::post('projects/assign_to','ProjectsController@storeAssignTo')->name('projects.storeAssignTo');

    // Milestones
    Route::delete('milestones/destroy', 'MilestonesController@massDestroy')->name('milestones.massDestroy');
    Route::resource('milestones', 'MilestonesController');
    Route::get('milestones/assign_to/{id}','MilestonesController@getAssignTo')->name('milestones.getAssignTo');
    Route::post('milestones/assign_to','MilestonesController@storeAssignTo')->name('milestones.storeAssignTo');

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



//    Route::get('employees','SubDepartmentController@get_employees')->name('sub-department.get_employees');

//    //Project Specifications sub-department (values)
//    Route::delete('project_specification_departments/destroy', 'ProjectSpecificationDepartmentController@massDestroy')->name('project_specification_departments.massDestroy');
//    Route::resource('project_specification_departments', 'ProjectSpecificationDepartmentController');

});
