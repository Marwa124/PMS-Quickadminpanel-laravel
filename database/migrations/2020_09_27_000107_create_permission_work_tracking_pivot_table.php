<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionWorkTrackingPivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_work_tracking', function (Blueprint $table) {
            $table->unsignedInteger('work_tracking_id');
            $table->foreign('work_tracking_id', 'work_tracking_id_fk_2176413')->references('id')->on('work_trackings')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2176413')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
