<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionReturnStockPivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_return_stock', function (Blueprint $table) {
            $table->unsignedInteger('return_stock_id');
            $table->foreign('return_stock_id', 'return_stock_id_fk_2178581')->references('id')->on('return_stocks')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2178581')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
