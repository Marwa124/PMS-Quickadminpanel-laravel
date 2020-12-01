<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMeetingMinutesTable extends Migration
{
    public function up()
    {
        Schema::table('meeting_minutes', function (Blueprint $table) {
            // $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_2167949')->references('id')->on('users');
        });
    }
}
