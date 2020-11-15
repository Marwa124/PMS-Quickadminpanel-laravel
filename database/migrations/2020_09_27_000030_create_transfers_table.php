<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('to_account');
            $table->integer('from_account');
            $table->decimal('amount', 15, 2);
            $table->string('reference')->nullable();
            $table->string('status');
            $table->longText('notes')->nullable();
            $table->date('date')->nullable();
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
