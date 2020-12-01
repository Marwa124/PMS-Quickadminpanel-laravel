<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAccountDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('account_details', function (Blueprint $table) {
            // $table->unsignedInteger('user_id');
            // $table->foreign('user_id', 'user_fk_2165793')->references('id')->on('users');
            // $table->unsignedInteger('designation_id')->nullable();
            // $table->foreign('designation_id', 'designation_fk_2165804')->references('id')->on('designations');
        });
    }
}
