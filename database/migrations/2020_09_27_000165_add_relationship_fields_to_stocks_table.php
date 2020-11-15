<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStocksTable extends Migration
{
    public function up()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->unsignedInteger('stock_sub_category_id');
            $table->foreign('stock_sub_category_id', 'stock_sub_category_fk_2181050')->references('id')->on('stock_sub_categories');
        });
    }
}
