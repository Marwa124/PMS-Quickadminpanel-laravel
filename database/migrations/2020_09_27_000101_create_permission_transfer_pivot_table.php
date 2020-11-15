<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionTransferPivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_transfer', function (Blueprint $table) {
            $table->unsignedInteger('transfer_id');
            $table->foreign('transfer_id', 'transfer_id_fk_2179006')->references('id')->on('transfers')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2179006')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
