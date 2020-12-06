<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalaryDeductionsTable extends Migration
{
    public function up()
    {
        Schema::table('salary_deductions', function (Blueprint $table) {
            $table->unsignedInteger('salary_template_id');
            // $table->foreign('salary_template_id', 'salary_template_fk_2181316')->references('id')->on('salary_templates');
        });
    }
}
