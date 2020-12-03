<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->string('call_by')->nullable();
            $table->string('date')->nullable();
            $table->text('note')->nullable();
            $table->string('next_action')->nullable();
            $table->string('next_action_date')->nullable();
            $table->enum('call',['first','second'])->nullable();
            $table->enum('qualification',['Qualified-Meeting','Qualified-Follow Up','Proposal Sent','Qualified-Survey','Qualified-Postponed','Un-Qualified','other'])->nullable();


            $table->bigInteger('result_id')->unsigned()->nullable();
            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');

            $table->integer('lead_id')->unsigned()->nullable();
            $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calls');
    }
}
