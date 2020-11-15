<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeBanksTable extends Migration
{
    public function up()
    {
        Schema::create('employee_banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('branch_name');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('routing_number')->nullable();
            $table->string('type_of_account')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
