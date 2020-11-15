<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTasksTable extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_2165607')->references('id')->on('task_statuses');
            $table->unsignedInteger('assigned_to_id')->nullable();
            $table->foreign('assigned_to_id', 'assigned_to_fk_2165611')->references('id')->on('users');
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_2176616')->references('id')->on('projects');
            $table->unsignedInteger('milestone_id')->nullable();
            $table->foreign('milestone_id', 'milestone_fk_2176617')->references('id')->on('milestones');
            $table->unsignedInteger('opportunities_id')->nullable();
            $table->foreign('opportunities_id', 'opportunities_fk_2176618')->references('id')->on('opportunities');
            $table->unsignedInteger('work_tracking_id')->nullable();
            $table->foreign('work_tracking_id', 'work_tracking_fk_2176619')->references('id')->on('work_trackings');
            $table->unsignedInteger('lead_id')->nullable();
            $table->foreign('lead_id', 'lead_fk_2176628')->references('id')->on('leads');
        });
    }
}
