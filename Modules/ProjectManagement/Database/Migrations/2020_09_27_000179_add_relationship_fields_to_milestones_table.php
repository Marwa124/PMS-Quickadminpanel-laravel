<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMilestonesTable extends Migration
{
    public function up()
    {
        Schema::table('milestones', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_2176530')->references('id')->on('users');
            $table->unsignedInteger('project_id');
            $table->foreign('project_id', 'project_fk_2176531')->references('id')->on('projects');
        });
    }
}
