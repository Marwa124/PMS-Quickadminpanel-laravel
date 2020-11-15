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

Route::prefix('setting')->group(function() {
    Route::get('/', 'SETTINGController@index');
});

Route::group(['as' => 'setting.config.', 'prefix' => 'admin/setting', 'middleware' => ['auth']],function() {

    // Overtimes
    // Route::delete('overtimes/destroy', 'OvertimeController@massDestroy')->name('overtimes.massDestroy');
    // Route::post('overtimes/media', 'OvertimeController@storeMedia')->name('overtimes.storeMedia');
    // Route::post('overtimes/ckmedia', 'OvertimeController@storeCKEditorImages')->name('overtimes.storeCKEditorImages');
    Route::get('config', 'ConfigsController@index')->name('index');
    Route::put('config', 'ConfigsController@update')->name('update');
    // Route::resource('config', 'ConfigsController');

});