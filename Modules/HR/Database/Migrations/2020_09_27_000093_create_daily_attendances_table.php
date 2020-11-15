<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('daily_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clock_in')->nullable();
            $table->string('clock_out')->nullable();
            $table->integer('absent')->nullable();
            $table->integer('vacation')->nullable();
            $table->integer('holiday')->nullable();
            $table->date('created_day')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
