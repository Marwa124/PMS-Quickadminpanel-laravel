<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAdvanceSalariesTable extends Migration
{
    public function up()
    {
        Schema::table('advance_salaries', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_2181058')->references('id')->on('users');
        });
    }
}
