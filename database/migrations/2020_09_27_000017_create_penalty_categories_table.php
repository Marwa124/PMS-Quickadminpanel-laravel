<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenaltyCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('penalty_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->integer('fine_amount');
            $table->string('penelty_days');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
