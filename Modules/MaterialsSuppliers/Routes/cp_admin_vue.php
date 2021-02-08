<?php

use Illuminate\Http\Request;

Route::group(['as' => 'api.', 'prefix' => 'v1/admin/materialssuppliers', 'namespace' => 'Api\V1\Admin'], function () {

    Route::apiResource('items', 'ItemsApiController');
    Route::apiResource('tax-rates', 'TaxRatesApiController');
    Route::apiResource('suppliers', 'SuppliersApiController');

});
