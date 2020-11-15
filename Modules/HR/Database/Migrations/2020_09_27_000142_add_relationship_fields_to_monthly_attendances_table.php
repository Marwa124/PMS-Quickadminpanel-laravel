<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMonthlyAttendancesTable extends Migration
{
    public function up()
    {
        Schema::table('monthly_attendances', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2168451')->references('id')->on('users');
        });
    }
}
