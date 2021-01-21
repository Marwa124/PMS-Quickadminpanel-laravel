<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_2176360')->references('id')->on('clients');
        });
    }
}
