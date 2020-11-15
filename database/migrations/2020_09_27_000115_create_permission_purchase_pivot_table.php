<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionPurchasePivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_purchase', function (Blueprint $table) {
            $table->unsignedInteger('purchase_id');
            $table->foreign('purchase_id', 'purchase_id_fk_2178520')->references('id')->on('purchases')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2178520')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
