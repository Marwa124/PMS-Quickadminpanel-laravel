<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunitiesTable extends Migration
{
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('probability')->nullable();
            $table->string('stages')->nullable();
            $table->date('closed_date')->nullable();
            $table->float('expected_revenue', 15, 2)->nullable();
            $table->string('new_link')->nullable();
            $table->string('next_action')->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
