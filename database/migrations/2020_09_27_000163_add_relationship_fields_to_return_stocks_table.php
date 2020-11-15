<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReturnStocksTable extends Migration
{
    public function up()
    {
        Schema::table('return_stocks', function (Blueprint $table) {
            $table->unsignedInteger('supplier_id')->nullable();
            $table->foreign('supplier_id', 'supplier_fk_2178565')->references('id')->on('suppliers');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2178573')->references('id')->on('users');
        });
    }
}
