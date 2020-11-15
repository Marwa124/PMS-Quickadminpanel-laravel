<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadPermissionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('lead_permission', function (Blueprint $table) {
            $table->unsignedInteger('lead_id');
            $table->foreign('lead_id', 'lead_id_fk_2172463')->references('id')->on('leads')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2172463')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
