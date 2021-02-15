<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
            
            $table->bigInteger('lead_id')->unsigned()->nullable();
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
            $table->unsignedInteger('customer_group_id')->nullable();
            $table->foreign('customer_group_id')->references('id')->on('customer_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
