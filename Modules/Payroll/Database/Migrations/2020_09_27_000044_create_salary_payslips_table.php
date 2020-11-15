<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryPayslipsTable extends Migration
{
    public function up()
    {
        Schema::create('salary_payslips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payslip_number')->nullable();
            $table->date('payslip_generate_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
