<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalaryPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('salary_payments', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id', 'user_fk_2181366')->references('id')->on('users');
        });
    }
}
