<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKbCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('kb_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->longText('description')->nullable();
            $table->string('type');
            $table->integer('sort')->nullable();
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
