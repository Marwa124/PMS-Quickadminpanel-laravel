<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDesignationsTable extends Migration
{
    public function up()
    {
        Schema::table('designations', function (Blueprint $table) {
            $table->unsignedInteger('department_id')->nullable();
            // $table->foreign('department_id', 'department_fk_2165736')->references('id')->on('departments');
        });
    }
}
