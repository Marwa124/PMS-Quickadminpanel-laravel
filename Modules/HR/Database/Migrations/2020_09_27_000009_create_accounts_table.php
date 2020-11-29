<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->string('balance')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    // public function down()
    // {
    //     Schema::dropIfExists('accounts');
    // }
}
