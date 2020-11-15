<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStockSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('stock_sub_categories', function (Blueprint $table) {
            $table->unsignedInteger('stock_category_id');
            $table->foreign('stock_category_id', 'stock_category_fk_2180993')->references('id')->on('stock_categories');
        });
    }
}
