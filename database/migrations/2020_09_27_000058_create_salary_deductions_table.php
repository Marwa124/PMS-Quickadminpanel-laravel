<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryDeductionsTable extends Migration
{
    public function up()
    {
        Schema::create('salary_deductions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('value');
            // $table->timestamps();
            // $table->softDeletes();
        });
    }
}
