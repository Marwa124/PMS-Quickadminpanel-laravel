<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionProjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_project', function (Blueprint $table) {
            $table->unsignedInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_2176377')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2176377')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
