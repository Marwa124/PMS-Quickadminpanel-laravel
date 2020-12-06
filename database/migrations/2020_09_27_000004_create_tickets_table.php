<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ticket_code')->nullable();
            $table->string('email')->nullable();
            $table->string('subject')->nullable();
            $table->longText('body')->nullable();
            $table->string('status')->nullable();
            $table->integer('reporter')->nullable();
            $table->string('priority')->nullable();
            $table->longText('comment')->nullable();
            $table->string('last_reply')->nullable();
            $table->unsignedInteger('project_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
