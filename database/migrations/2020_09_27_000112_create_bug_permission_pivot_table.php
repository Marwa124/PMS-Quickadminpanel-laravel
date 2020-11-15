<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBugPermissionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('bug_permission', function (Blueprint $table) {
            $table->unsignedInteger('bug_id');
            $table->foreign('bug_id', 'bug_id_fk_2176562')->references('id')->on('bugs')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2176562')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
