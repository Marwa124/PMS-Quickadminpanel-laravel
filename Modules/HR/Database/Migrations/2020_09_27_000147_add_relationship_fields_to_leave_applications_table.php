<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLeaveApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('leave_applications', function (Blueprint $table) {
            // $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2167932')->references('id')->on('users');
            $table->unsignedInteger('leave_category_id');
            $table->foreign('leave_category_id', 'leave_category_fk_2167933')->references('id')->on('leave_categories');
        });
    }
}
