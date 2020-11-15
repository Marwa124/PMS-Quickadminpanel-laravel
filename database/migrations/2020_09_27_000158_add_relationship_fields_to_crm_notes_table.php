<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCrmNotesTable extends Migration
{
    public function up()
    {
        Schema::table('crm_notes', function (Blueprint $table) {
            $table->unsignedInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_2159280')->references('id')->on('clients');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_2182335')->references('id')->on('users');
        });
    }
}
