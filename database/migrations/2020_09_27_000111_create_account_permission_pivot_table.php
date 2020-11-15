<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountPermissionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('account_permission', function (Blueprint $table) {
            $table->unsignedInteger('account_id');
            $table->foreign('account_id', 'account_id_fk_2176503')->references('id')->on('accounts')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2176503')->references('id')->on('permissions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('account_permission');
    }
}
