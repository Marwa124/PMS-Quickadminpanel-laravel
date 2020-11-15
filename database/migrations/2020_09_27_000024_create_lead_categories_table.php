<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('lead_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('type')->nullable();
            $table->string('order_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
