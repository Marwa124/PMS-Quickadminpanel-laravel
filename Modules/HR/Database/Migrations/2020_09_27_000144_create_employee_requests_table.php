<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('employee_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->date('day')->nullable();
            $table->time('from_time')->nullable();
            $table->time('to_time')->nullable();
            $table->string('day_hour')->default('day');
            $table->string('status')->default('pending')->comment('pending, approved, rejected');
            $table->longText('comments')->nullable();
            $table->string('approved_by')->nullable();
            // $table->integer('user_id')->unsigned()->nullable();
            $table->string('users')->nullable();
            $table->enum('request_type', ['survey', 'client_meeting'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('employee_requests');
    }
}
