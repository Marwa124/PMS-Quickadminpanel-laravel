<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDepartmentsTable extends Migration
{
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->unsignedInteger('department_head_id')->nullable();
            // $table->foreign('department_head_id', 'department_head_fk_2165716')->references('id')->on('users');
        });
    }
}
