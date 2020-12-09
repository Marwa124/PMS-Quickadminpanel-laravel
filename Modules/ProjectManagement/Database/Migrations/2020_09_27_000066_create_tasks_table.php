<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->date('due_date')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('progress')->nullable();
            $table->string('calculate_progress')->nullable();
            $table->string('task_hours')->nullable();
            $table->longText('notes')->nullable();
            $table->string('timer_status')->nullable();
            $table->integer('timer_started_by')->nullable();
            $table->integer('start_timer')->nullable();
            $table->integer('logged_timer')->nullable();
            $table->integer('created_by')->nullable();
            $table->string('client_visible')->nullable();
            $table->float('hourly_rate', 15, 2)->nullable();
            $table->string('billable')->nullable();
            $table->integer('index_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
