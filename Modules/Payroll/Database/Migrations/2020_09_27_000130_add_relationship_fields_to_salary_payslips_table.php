<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalaryPayslipsTable extends Migration
{
    public function up()
    {
        Schema::table('salary_payslips', function (Blueprint $table) {
            $table->unsignedInteger('salary_payment_id');
            $table->foreign('salary_payment_id', 'salary_payment_fk_2181529')->references('id')->on('salary_payments');
        });
    }
}
