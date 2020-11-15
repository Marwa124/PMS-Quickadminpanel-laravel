<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionTaxRatePivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_tax_rate', function (Blueprint $table) {
            $table->unsignedInteger('tax_rate_id');
            $table->foreign('tax_rate_id', 'tax_rate_id_fk_2180897')->references('id')->on('tax_rates')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2180897')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
