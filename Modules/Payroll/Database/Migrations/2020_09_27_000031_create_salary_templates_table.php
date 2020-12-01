<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryTemplatesTable extends Migration
{
    public function up()
    {
        Schema::create('salary_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('salary_grade');
            $table->string('basic_salary');
            $table->string('overtime_salary')->default(0);
            $table->integer('designation_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
