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

Route::prefix('finance')->group(function() {
    Route::get('/', 'FinanceController@index');
});


Route::group(['as' => 'finance.admin.', 'prefix' => 'admin/finance', 'namespace' => 'Admin', 'middleware' => ['auth']],function() {

    ////////////////////////////////////BALANCE SHEET//////////////////////////////////////////////////////////////////
    Route::get('balance_sheet','FinanceController@balance_sheet')->name('balance_sheet');
    ////////////////////////////////END BALANCE SHEET//////////////////////////////////////////////////////////////////

    ////////////////////////////////////PAYMENT METHOD/////////////////////////////////////////////////////////////////
    Route::resource('payment_method','PaymentmethodController');
    Route::delete('payment_method_mass_destroy','PaymentmethodController@massDestroy')->name('payment_method.massDestroy');
    ////////////////////////////////END PAYMENT METHOD/////////////////////////////////////////////////////////////////

    ////////////////////////////////////TRANSFERS//////////////////////////////////////////////////////////////////////
    Route::post('transfers/media', 'TransfersController@storeMediaWithSameName')->name('transfers.storeMedia');
    Route::get('transfers/media/download/{id}', 'TransfersController@downloadMedia')->name('transfers.download.attach');
    Route::get('transfers/media/view/{id}', 'TransfersController@viewMedia')->name('transfers.view.attach');
    Route::get('transfers/media/delete/{id}/{transfer}', 'TransfersController@deleteMedia')->name('transfers.delete.attach');
    Route::resource('transfers','TransfersController');
    Route::delete('transfers_mass_destroy','TransfersController@massDestroy')->name('transfers.massDestroy');
    Route::get('transfers_get_data','TransfersController@get_data')->name('transfers.get_data');
    ////////////////////////////////END TRANSFERS//////////////////////////////////////////////////////////////////////

});
