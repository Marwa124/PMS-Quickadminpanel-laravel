<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropStatusIdFromTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('tasks', function (Blueprint $table) {
            //$table->dropForeign('status_fk_2165607');
            $table->dropColumn('status_id');
            //$table->enum('status', ['Not Started','In Progress','Completed','Deffered','Waiting For Someone'])->default('Not Started');
        });
        Schema::enableForeignKeyConstraints();
        Schema::table('tasks', function (Blueprint $table) {
            $table->enum('status', ['Not Started','In Progress','Completed','Deffered','Waiting For Someone'])->default('Not Started');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
