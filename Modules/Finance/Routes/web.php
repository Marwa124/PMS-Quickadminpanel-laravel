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

    ////////////////////////////////////DEPOSITS Category//////////////////////////////////////////////////////////////
    Route::resource('deposits_category','DepositsCategoryController');
    Route::delete('deposits_category_mass_destroy','DepositsCategoryController@massDestroy')->name('deposits_category.massDestroy');
    ////////////////////////////////END DEPOSITS Category//////////////////////////////////////////////////////////////

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

    ////////////////////////////////////DEPOSITS///////////////////////////////////////////////////////////////////////
    Route::post('deposits/media', 'DepositsController@storeMediaWithSameName')->name('deposits.storeMedia');
    Route::get('deposits/media/download/{id}', 'DepositsController@downloadMedia')->name('deposits.download.attach');
    Route::get('deposits/media/view/{id}', 'DepositsController@viewMedia')->name('deposits.view.attach');
    Route::get('deposits/media/delete/{id}/{transfer}', 'DepositsController@deleteMedia')->name('deposits.delete.attach');
    Route::resource('deposits','DepositsController');
    Route::delete('deposits_mass_destroy','DepositsController@massDestroy')->name('deposits.massDestroy');
    Route::get('deposits_get_data','DepositsController@get_data')->name('deposits.get_data');
    Route::get('deposits_getapproved/{id}','DepositsController@getapproved')->name('deposits.getapproved');
    Route::get('deposits_getpaid/{id}','DepositsController@getpaid')->name('deposits.getpaid');
    ////////////////////////////////END DEPOSITS///////////////////////////////////////////////////////////////////////

    ////////////////////////////////////INVOICES///////////////////////////////////////////////////////////////////////
    Route::delete('invoices/destroy', 'InvoicesController@massDestroy')->name('invoices.massDestroy');
    Route::post('invoices/getmodule', 'InvoicesController@getmodule')->name('invoices.getmodule');
    Route::post('invoices/get_taxes', 'InvoicesController@get_taxes_ajax')->name('invoices.get_taxes_ajax');
    Route::post('invoices/getinvoiceitem', 'InvoicesController@get_item_by_id')->name('invoices.getinvoiceitem');
    Route::post('invoices/media', 'InvoicesController@storeMedia')->name('invoices.storeMedia');
    Route::post('invoices/ckmedia', 'InvoicesController@storeCKEditorImages')->name('invoices.storeCKEditorImages');
    Route::resource('invoices', 'InvoicesController');
    Route::get('invoices/getpdf/{id}', 'PdfController@pdf')->name('invoices.pdf');
    Route::post('invoices/get_projects', 'InvoicesController@get_projects');
    Route::get('invoices/change_status_approved/{id}', 'InvoicesController@change_status_approved')->name('invoices.change_status_approved');
    Route::get('invoices/change_status_reject/{id}', 'InvoicesController@change_status_reject')->name('invoices.change_status_reject');
    ////////////////////////////////END INVOICES///////////////////////////////////////////////////////////////////////









    ////////////////////////////////////Office Asset//////////////////////////////////////////////////////////////

    ////////////////////////////////////STOCK CATEGORY//////////////////////////////////////////////////////////////
    Route::resource('stock_category','StockCategoryController');
    Route::post('stock_category/update/data','StockCategoryController@update_main_category')->name('stock_category.update.form');
    Route::delete('stock_category_destroy','StockCategoryController@subCategoryDestroy')->name('sub_stock_category.destroy');
    Route::delete('stock_category_mass_destroy','StockCategoryController@massDestroy')->name('sub_stock_category.massDestroy');
    ////////////////////////////////END STOCK CATEGORY//////////////////////////////////////////////////////////////

    ////////////////////////////////////STOCK LIST//////////////////////////////////////////////////////////////
    Route::get('stocks','StocksController@index')->name('stocks.index');
    Route::get('stocks/create','StocksController@create')->name('stocks.create');
    Route::post('stocks/store','StocksController@store')->name('stocks.store');
    Route::get('stocks/edit/{name}/{sub_stock_category}','StocksController@edit')->name('stocks.edit');
    Route::put('stocks/update','StocksController@update')->name('stocks.update');
    Route::delete('stocks/destory/{name}/{sub_stock_category}','StocksController@destroy')->name('stocks.destroy');

    Route::get('stocks/history','StocksController@history')->name('stocks.history');
    Route::post('stocks/getresult/search','StocksController@history_search_result')->name('stocks.getresult');
    Route::get('stocks_history/edit/{id}','StocksController@stocks_history_edit')->name('stocks_history.edit');
    Route::put('stocks_history/update','StocksController@stocks_history_update')->name('stocks_history.update');
    Route::delete('stocks_history/destroy/{id}','StocksController@stocks_history_destroy')->name('stocks_history.destroy');

    ////////////////////////////////END STOCK LIST//////////////////////////////////////////////////////////////



    ////////////////////////////////////Assign Stock//////////////////////////////////////////////////////////////
    Route::get('assign_stocks/report','AssignStocksController@report')->name('assign_stocks.report');
    Route::post('assign_stocks/report/getresult','AssignStocksController@report_result')->name('assign_stocks.getresult');
    Route::get('assign_stocks/report/pdf/{id}','AssignStocksController@pdf')->name('assign_stocks.pdf');
    Route::resource('assign_stocks','AssignStocksController');
    Route::delete('assign_stocks_mass_destroy','AssignStocksController@massDestroy')->name('assign_stocks.massDestroy');
    Route::post('assign_stocks/get_items','AssignStocksController@get_items');
    ////////////////////////////////END Assign Stock//////////////////////////////////////////////////////////////


    ////////////////////////////////END Office Asset//////////////////////////////////////////////////////////////

});
