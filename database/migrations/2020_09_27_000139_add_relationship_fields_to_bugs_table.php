<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBugsTable extends Migration
{
    public function up()
    {
        Schema::table('bugs', function (Blueprint $table) {
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_2176551')->references('id')->on('projects');
            $table->unsignedInteger('opportunities_id')->nullable();
            $table->foreign('opportunities_id', 'opportunities_fk_2176552')->references('id')->on('opportunities');
            $table->unsignedInteger('task_id')->nullable();
            $table->foreign('task_id', 'task_fk_2176553')->references('id')->on('tasks');
        });
    }
}
