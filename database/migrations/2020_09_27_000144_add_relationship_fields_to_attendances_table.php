<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAttendancesTable extends Migration
{
    public function up()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_2168111')->references('id')->on('users');
            $table->unsignedInteger('leave_application_id')->nullable();
            $table->foreign('leave_application_id', 'leave_application_fk_2168112')->references('id')->on('leave_applications');
        });
    }
}
