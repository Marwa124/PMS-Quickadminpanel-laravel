<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id_on_pms')->nullable();
            $table->string('product')->nullable();
            $table->string('client_name')->nullable();
            $table->string('company')->nullable();
            $table->string('site_url')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();

            $table->string('way_of_communication')->nullable();
            $table->string('contacted_date')->nullable();
            $table->text('notes')->nullable();
            $table->string('next_action_date')->nullable();
            $table->boolean('first_call_done')->nullable();
            $table->boolean('second_call_done')->nullable();
            $table->enum('priority',['URGENT','NORMAL','LOW','VIP'])->nullable();
            $table->enum('contracted',['Busy','Call Later','No Answer','Not Interested','Out Of Service','Product Not Available','Switched OFF','Undefined','Whatsapp','Wrong Number','YES - INTERESTED','YES - Not Qualified'])->nullable();



            $table->bigInteger('type_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');


                $table->bigInteger('first_call_result_id')->unsigned()->nullable();
            $table->foreign('first_call_result_id')->references('id')->on('results')->onDelete('cascade');

            $table->bigInteger('second_call_result_id')->unsigned()->nullable();
            $table->foreign('second_call_result_id')->references('id')->on('results')->onDelete('cascade');

            $table->integer('added_by')->nullable();

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
        Schema::dropIfExists('leads');
    }
}
