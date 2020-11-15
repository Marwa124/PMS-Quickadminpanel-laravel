<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::table('time_entries', function (Blueprint $table) {
            $table->unsignedInteger('work_type_id')->nullable();
            $table->foreign('work_type_id', 'work_type_fk_2165587')->references('id')->on('time_work_types');
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_2165588')->references('id')->on('time_projects');
        });
    }
}
