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

// Route::prefix('sales')->group(function() {
//     Route::get('/', 'SalesController@index');
// });
// Route::get('/', 'SalesController@index');
Route::group(['as' => 'sales.admin.', 'prefix' => 'admin/sales', 'namespace' => 'Admin', 'middleware' => ['auth']],function() {
     // Proposals
    Route::delete('proposals/destroy', 'ProposalsController@massDestroy')->name('proposals.massDestroy');
    Route::post('proposals/media', 'ProposalsController@storeMedia')->name('proposals.storeMedia');
    Route::post('proposals/ckmedia', 'ProposalsController@storeCKEditorImages')->name('proposals.storeCKEditorImages');
    Route::resource('proposals', 'ProposalsController');

    // Proposals Items
    Route::delete('proposals-items/destroy', 'ProposalsItemsController@massDestroy')->name('proposals-items.massDestroy');
    Route::post('proposals-items/media', 'ProposalsItemsController@storeMedia')->name('proposals-items.storeMedia');
    Route::post('proposals-items/ckmedia', 'ProposalsItemsController@storeCKEditorImages')->name('proposals-items.storeCKEditorImages');
    Route::resource('proposals-items', 'ProposalsItemsController');

    // Interested Ins
    Route::delete('interested-ins/destroy', 'InterestedInController@massDestroy')->name('interested-ins.massDestroy');
    Route::resource('interested-ins', 'InterestedInController', ['except' => ['edit', 'update', 'show']]);

    // types
    Route::resource('types', 'TypesController');
    Route::delete('type/destroy', 'TypesController@massDestroy')->name('type.massDestroy');
    // results
    Route::resource('results', 'ResultsController');
    Route::delete('result/destroy', 'ResultsController@massDestroy')->name('results.massDestroy');
    // countries
    Route::resource('countries', 'CountriesController');
    Route::delete('country/destroy', 'CountriesController@massDestroy')->name('country.massDestroy');

    // leads
    Route::resource('leads', 'LeadsController');
    Route::delete('leads/destroy', 'LeadsController@massDestroy')->name('leads.massDestroy');

    Route::get('leads_getdata', 'LeadsController@getData')->name('leads.getdata');
    Route::get('lead-convert-opportunity/{id}', 'LeadsController@convert_opportunity')->name('convert.to.oppurtinuty');
    Route::get('assign', 'LeadsController@assignLeadsView')->name('assign')->middleware('access');
    Route::post('assign', 'LeadsController@assignLeadsProcess')->name('leads.assignPost');//->middleware('access')
    //calls
    Route::get('calls/getdata', 'CallsController@getData')->name('calls.getdata');
    Route::resource('calls', 'CallsController');
    //Finalresults
    Route::get('finalresult/getdata', 'FinalresultsController@getData')->name('finalresult.getdata');
    Route::resource('finalresults', 'FinalresultsController');
});
