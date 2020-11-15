<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeePermissionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('employee_permission', function (Blueprint $table) {
            $table->unsignedInteger('employee_id');
            $table->foreign('employee_id', 'employee_id_fk_2165491')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2165491')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
