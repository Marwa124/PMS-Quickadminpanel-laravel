<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryPaymentAllowancesTable extends Migration
{
    public function up()
    {
        Schema::create('salary_payment_allowances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('value');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
