<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBugsTable extends Migration
{
    public function up()
    {
        Schema::create('bugs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('issue_no')->nullable();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->string('status')->nullable();
            $table->longText('notes')->nullable();
            $table->string('priority');
            $table->string('severity')->nullable();
            $table->longText('reproducibility')->nullable();
            $table->integer('reporter')->nullable();
            $table->string('client_visible')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
