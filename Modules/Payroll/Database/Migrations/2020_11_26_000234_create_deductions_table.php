<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeductionsTable extends Migration
{
    public function up()
    {
        Schema::create('deductions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('type')->nullable();
            $table->integer('minutes')->nullable();
            $table->float('days')->nullable();
            $table->string('subtracted')->default("no");
            $table->string('minutes_type')->nullable();
            $table->string('reason')->nullable();
            $table->date('date')->nullable();
            // $table->timestamps();
        });
    }
}
