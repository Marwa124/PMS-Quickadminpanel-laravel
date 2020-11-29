<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->longText('cover_letter')->nullable();
            $table->string('application_status')->nullable()->default('unread');
            $table->date('apply_date')->nullable();
            $table->string('send_email')->nullable();
            $table->date('interview_date')->nullable();
            $table->unsignedInteger('job_circular_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
