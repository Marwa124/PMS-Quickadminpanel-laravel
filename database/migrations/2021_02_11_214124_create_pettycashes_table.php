<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePettycashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pettycashes', function (Blueprint $table) {
            $table->increments('id');


            $table->string('date')->nullable();
            $table->double('amount')->nullable();
            $table->text('description')->nullable();
            $table->enum('pettycash_status',['pending','accepted','rejected'])->default('pending')->nullable();
            $table->text('reference_no')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('has_deduction')->default(0)->nullable();
            $table->double('deduction_value')->default(0)->nullable();




            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('users');


            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pettycashes');
    }
}
