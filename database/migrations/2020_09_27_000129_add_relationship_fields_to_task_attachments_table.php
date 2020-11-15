<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTaskAttachmentsTable extends Migration
{
    public function up()
    {
        Schema::table('task_attachments', function (Blueprint $table) {
            $table->unsignedInteger('task_id')->nullable();
            $table->foreign('task_id', 'task_fk_2182408')->references('id')->on('tasks');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2182409')->references('id')->on('users');
            $table->unsignedInteger('lead_id')->nullable();
            $table->foreign('lead_id', 'lead_fk_2182412')->references('id')->on('leads');
            $table->unsignedInteger('opportunities_id')->nullable();
            $table->foreign('opportunities_id', 'opportunities_fk_2182413')->references('id')->on('opportunities');
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_2182414')->references('id')->on('projects');
            $table->unsignedInteger('bug_id')->nullable();
            $table->foreign('bug_id', 'bug_fk_2182415')->references('id')->on('bugs');
        });
    }
}
