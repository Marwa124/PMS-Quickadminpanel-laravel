<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryPaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('salary_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_month');
            $table->float('fine_deduction');
            $table->unsignedInteger('payment_method_id');
            $table->longText('comments')->nullable();
            $table->timestamp('paid_date')->nullable();
            $table->string('deduct_from')->nullable();
            $table->timestamps();
            // $table->softDeletes();
        });
    }
}
