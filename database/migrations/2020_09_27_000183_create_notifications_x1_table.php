<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsX1Table extends Migration
{
    public function up()
    {
        Schema::create('notifications_x1', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content')->nullable();
            $table->integer('model_id')->nullable();
            $table->boolean('type');
            $table->unsignedInteger('notify_type');
            $table->string('redirect_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->boolean('is_send');
            $table->timestamps();


        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications_x1');
    }
}
