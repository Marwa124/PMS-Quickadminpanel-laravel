<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunityPermissionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('opportunity_permission', function (Blueprint $table) {
            $table->unsignedInteger('opportunity_id');
            $table->foreign('opportunity_id', 'opportunity_id_fk_2172525')->references('id')->on('opportunities')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2172525')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
