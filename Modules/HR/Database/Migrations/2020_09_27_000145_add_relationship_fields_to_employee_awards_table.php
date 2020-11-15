<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEmployeeAwardsTable extends Migration
{
    public function up()
    {
        Schema::table('employee_awards', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_2168023')->references('id')->on('users');
        });
    }
}
