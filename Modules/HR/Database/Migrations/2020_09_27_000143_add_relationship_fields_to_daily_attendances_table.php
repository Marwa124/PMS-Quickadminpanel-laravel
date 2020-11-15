<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDailyAttendancesTable extends Migration
{
    public function up()
    {
        Schema::table('daily_attendances', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_2168401')->references('id')->on('users');
        });
    }
}
