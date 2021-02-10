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


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('settings', 'SettingController@company_details')->name('admin.settings.index');


    Route::post('save_details', 'SettingController@save_details')->name('admin.details.store');
    Route::post('save_system', 'SettingController@save_system')->name('admin.system.store');


    Route::post('save_currency', 'SettingController@save_currency')->name('admin.currency.store');
    Route::post('update_currency', 'SettingController@update_currency')->name('admin.currency.update');
    Route::post('remove_currency', 'SettingController@remove_currency')->name('admin.currency.remove');
});