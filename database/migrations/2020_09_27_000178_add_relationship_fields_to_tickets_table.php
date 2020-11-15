<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTicketsTable extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_2176638')->references('id')->on('projects');
            $table->unsignedInteger('department_id')->nullable();
            $table->foreign('department_id', 'department_fk_2176644')->references('id')->on('departments');
        });
    }
}
