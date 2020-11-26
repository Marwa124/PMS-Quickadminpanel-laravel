<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('reason')->nullable();
            $table->string('leave_type');
            $table->string('hours')->nullable();
            $table->date('leave_start_date');
            $table->date('leave_end_date')->nullable();
            $table->string('application_status')->default('pending');
            $table->integer('view_status')->nullable();
            $table->longText('comments')->nullable();
            $table->string('approved_by')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->enum('deduct', ['no', 'yes'])->nullable('no');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
