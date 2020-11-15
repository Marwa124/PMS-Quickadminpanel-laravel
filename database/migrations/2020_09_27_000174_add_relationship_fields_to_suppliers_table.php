<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSuppliersTable extends Migration
{
    public function up()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->unsignedInteger('customer_group_id');
            $table->foreign('customer_group_id', 'customer_group_fk_2178477')->references('id')->on('customer_groups');
        });
    }
}
