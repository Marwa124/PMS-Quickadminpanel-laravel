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
    Route::get('transfers_report','TransfersController@report')->name('transfers_report');
    ////////////////////////////////END TRANSFERS//////////////////////////////////////////////////////////////////////



    ////////////////////////////////////EXPENSES Category//////////////////////////////////////////////////////////////
    Route::resource('expenses_category','ExpensesCategoryController');
    Route::delete('expenses_category_mass_destroy','ExpensesCategoryController@massDestroy')->name('expenses_category.massDestroy');
    ////////////////////////////////END EXPENSES Category//////////////////////////////////////////////////////////////

    ////////////////////////////////////EXPENSES///////////////////////////////////////////////////////////////////////
    Route::post('expenses/media', 'ExpensesController@storeMediaWithSameName')->name('expenses.storeMedia');
    Route::get('expenses/media/download/{id}', 'ExpensesController@downloadMedia')->name('expenses.download.attach');
    Route::get('expenses/media/view/{id}', 'ExpensesController@viewMedia')->name('expenses.view.attach');
    Route::get('expenses/media/delete/{id}/{transfer}', 'ExpensesController@deleteMedia')->name('expenses.delete.attach');
    Route::resource('expenses','ExpensesController');
    Route::delete('expenses_mass_destroy','ExpensesController@massDestroy')->name('expenses.massDestroy');
    Route::get('expenses_get_data','ExpensesController@get_data')->name('expenses.get_data');
    Route::get('expenses_getapproved/{id}','ExpensesController@getapproved')->name('expenses.getapproved');
    Route::get('expenses_getpaid/{id}','ExpensesController@getpaid')->name('expenses.getpaid');
    ////////////////////////////////END EXPENSES///////////////////////////////////////////////////////////////////////

});
