<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPrivateChatsTable extends Migration
{
    public function up()
    {
        Schema::table('private_chats', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_2182506')->references('id')->on('users');
        });
    }
}
