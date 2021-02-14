<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlements', function (Blueprint $table) {
            $table->increments('id');


            $table->double('amount')->nullable();
            $table->string('date')->nullable();
            $table->text('description')->nullable();
            $table->string('invoice_number')->nullable();
            $table->text('comment')->nullable();
            $table->enum('settlement_status',['pending','accepted','rejected'])->default('pending')->nullable();
            $table->enum('settlement_type',['ST','TR','E&W','TEL','IT','F&B','M&C'])->nullable();



            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('approved_by')->nullable();
            $table->foreign('approved_by')->references('id')->on('users');


            $table->unsignedInteger('pettycash_id')->nullable();
            $table->foreign('pettycash_id')->references('id')->on('pettycashes');


            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects');


            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');



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
        Schema::dropIfExists('settlements');
    }
}
