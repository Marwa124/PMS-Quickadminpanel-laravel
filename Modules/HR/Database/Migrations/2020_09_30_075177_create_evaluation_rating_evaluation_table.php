<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationRatingEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_rating_evaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rating_evaluation_id')->nullable();
            $table->unsignedInteger('evaluation_id')->nullable();
            $table->float('rate')->nullable();
            $table->text('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fingerprint_attendances');
    }
}
