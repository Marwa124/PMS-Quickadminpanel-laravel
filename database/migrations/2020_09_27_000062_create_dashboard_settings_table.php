<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('dashboard_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('col')->nullable();
            $table->integer('order_no');
            $table->integer('status');
            $table->integer('report');
            $table->integer('for_staff')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
