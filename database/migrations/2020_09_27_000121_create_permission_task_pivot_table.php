<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionTaskPivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_task', function (Blueprint $table) {
            $table->unsignedInteger('task_id');
            $table->foreign('task_id', 'task_id_fk_2176630')->references('id')->on('tasks')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2176630')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
