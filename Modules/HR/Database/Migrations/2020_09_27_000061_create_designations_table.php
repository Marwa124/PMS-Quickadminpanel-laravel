<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationsTable extends Migration
{
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designation_name');
            $table->unsignedInteger('designation_leader_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
