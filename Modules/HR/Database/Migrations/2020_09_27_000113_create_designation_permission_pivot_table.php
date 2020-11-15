<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationPermissionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('designation_permission', function (Blueprint $table) {
            $table->unsignedInteger('designation_id');
            $table->foreign('designation_id', 'designation_id_fk_2165738')->references('id')->on('designations')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2165738')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
