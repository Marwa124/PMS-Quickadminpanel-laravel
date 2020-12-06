<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobCircularsTable extends Migration
{
    public function up()
    {
        Schema::create('job_circulars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('vacancy_no')->nullable();
            $table->date('posted_date')->nullable();
            $table->string('employment_type');
            $table->string('experience')->nullable();
            $table->string('age')->nullable();
            $table->string('salary_range')->nullable();
            $table->date('last_date')->nullable();
            $table->longText('description')->nullable();
            $table->string('status')->nullable();
            $table->unsignedInteger('designation_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
