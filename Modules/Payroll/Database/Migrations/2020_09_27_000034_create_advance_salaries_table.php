<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvanceSalariesTable extends Migration
{
    public function up()
    {
        Schema::create('advance_salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('advance_amount');
            $table->string('deduct_month')->nullable();
            $table->longText('reason')->nullable();
            $table->date('request_date');
            $table->integer('status');
            $table->integer('approve_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
