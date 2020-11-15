<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobCircularPermissionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('job_circular_permission', function (Blueprint $table) {
            $table->unsignedInteger('job_circular_id');
            $table->foreign('job_circular_id', 'job_circular_id_fk_2168613')->references('id')->on('job_circulars')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2168613')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
