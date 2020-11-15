<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionTrainingPivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_training', function (Blueprint $table) {
            $table->unsignedInteger('training_id');
            $table->foreign('training_id', 'training_id_fk_2166224')->references('id')->on('trainings')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2166224')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
