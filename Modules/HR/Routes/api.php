<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/hr', function (Request $request) {
//     return $request->user();
// });

Route::group(['as' => 'api.', 'prefix' => 'v1/admin/hr', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth']], function () {
    
    Route::apiResource('account-details', 'AccountDetailsApiController');

    // Departments Json Vuejs
    Route::get('departments/list-vue', 'DepartmentsApiController@departmentListVue')->name('departments.list-vue');
    Route::post('departments/set-permissions/{id?}', 'DepartmentsApiController@setDepartmentPermissions')->name('departments.setPermissions');
    Route::apiResource('departments', 'DepartmentsApiController');
    
    Route::apiResource('designations', 'DesignationsApiController');

    // Evaluations
    Route::apiResource('evaluations', 'EvaluationsApiController');
});
