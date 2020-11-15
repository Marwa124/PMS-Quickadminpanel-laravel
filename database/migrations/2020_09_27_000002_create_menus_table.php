<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label')->unique();
            $table->string('link');
            $table->string('icon')->nullable();
            $table->integer('parent')->nullable();
            $table->integer('sort')->nullable();
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
