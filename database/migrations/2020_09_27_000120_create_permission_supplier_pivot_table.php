<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionSupplierPivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_supplier', function (Blueprint $table) {
            $table->unsignedInteger('supplier_id');
            $table->foreign('supplier_id', 'supplier_id_fk_2178478')->references('id')->on('suppliers')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2178478')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
