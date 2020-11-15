<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('monthly_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('total_attendance_days')->nullable();
            $table->integer('total_hours')->nullable();
            $table->integer('total_absence')->nullable();
            $table->integer('total_vacation')->nullable();
            $table->integer('holidays')->nullable();
            $table->date('created_month')->nullable();
            $table->timestamps();
        });
    }
}
