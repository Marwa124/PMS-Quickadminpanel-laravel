<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutgoingEmailsTable extends Migration
{
    public function up()
    {
        Schema::create('outgoing_emails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('send_to')->nullable();
            $table->string('send_from')->nullable();
            $table->longText('subject')->nullable();
            $table->longText('message')->nullable();
            $table->integer('delivered')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
