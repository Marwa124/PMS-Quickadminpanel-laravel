<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHourlyRatesTable extends Migration
{
    public function up()
    {
        Schema::create('hourly_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hourly_grade');
            $table->string('hourly_rate');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
