<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuotationsTable extends Migration
{
    public function up()
    {
        Schema::table('quotations', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2182699')->references('id')->on('users');
            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_2182700')->references('id')->on('clients');
        });
    }
}
