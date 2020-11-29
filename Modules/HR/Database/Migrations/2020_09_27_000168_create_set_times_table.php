<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetTimesTable extends Migration
{
    public function up()
    {
        Schema::create('set_times', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->time('in_time')->nullable();
            $table->time('out_time')->nullable();
            $table->time('allow_clock_in_late')->nullable();
            $table->time('allow_leave_early')->nullable();
            $table->string('deduction_day')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
