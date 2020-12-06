<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollSummariesTable extends Migration
{
    public function up()
    {
        Schema::create('payroll_summaries', function (Blueprint $table) {
            // $table->increments('id');
            $table->string('username')->nullable();
            $table->string('job_title')->nullable();
            $table->string('gross_salary')->default(0);
            $table->string('net_salary')->default(0);
            $table->string('daily_salary')->default(0);
            $table->string('total_days')->default(0);
            $table->string('total_absence')->default(0);
            $table->string('holidays')->default(0);
            $table->string('vacations')->default(0);
            $table->string('deductions')->default(0);
            $table->string('leave_days')->default(0);
            $table->string('late_minutes')->default(0);
            $table->string('extra_minutes')->default(0);
            $table->string('bonus')->default(0);
            $table->string('net_paid')->default(0);
            $table->string('month')->nullable();
            $table->integer('user_id')->unsigned();
            // $table->timestamps();
        });
    }
}
