<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicalCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('technical_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('beginner')->nullable();
            $table->string('intermediate')->nullable();
            $table->string('advanced')->nullable();
            $table->string('expert_leader')->nullable();
            $table->timestamps();
        });
    }
}
