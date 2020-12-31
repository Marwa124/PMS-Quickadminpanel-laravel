<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('progress')->nullable();
            $table->string('calculate_progress')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('actual_completion')->nullable();
            $table->integer('alert_overdue')->default(0);
            $table->float('project_cost', 15, 2)->nullable();
            $table->string('demo_url')->nullable();
            $table->string('project_status')->nullable();
            $table->longText('description')->nullable();
            $table->string('notify_client')->nullable();
            $table->string('timer_status')->nullable();
            $table->integer('timer_started_by')->nullable();
            $table->time('start_time')->nullable();
            $table->time('logged_time')->nullable();
            $table->longText('notes')->nullable();
            $table->string('hourly_rate')->nullable();
            $table->string('fixed_rate')->nullable();
            $table->longText('project_settings')->nullable();
            $table->string('with_tasks')->default('no');
            $table->string('estimate_hours')->nullable();
            $table->timestamps();
            $table->boolean('deleted_at')->default(0)->nullable();
            // $table->softDeletes();
        });
    }
}
