<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionTransactionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_transaction', function (Blueprint $table) {
            $table->unsignedInteger('transaction_id');
            $table->foreign('transaction_id', 'transaction_id_fk_2178835')->references('id')->on('transactions')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2178835')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
