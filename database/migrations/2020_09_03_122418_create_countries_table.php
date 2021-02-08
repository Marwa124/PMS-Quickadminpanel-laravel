<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();

            $table->string('iso2')->nullable();
            $table->string('value')->nullable();
            $table->string('long_name')->nullable();
            $table->string('iso3')->nullable();
            $table->string('numcode')->nullable();
            $table->string('un_member')->nullable();
            $table->string('calling_code')->nullable();
            $table->string('cctld')->nullable();
            $table->string('nationality')->nullable();
            $table->string('flag')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('time_zone')->nullable();

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
        Schema::dropIfExists('countries');
    }
}