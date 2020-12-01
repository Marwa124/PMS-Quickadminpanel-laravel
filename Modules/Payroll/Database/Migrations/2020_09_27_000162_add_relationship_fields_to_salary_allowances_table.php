<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalaryAllowancesTable extends Migration
{
    public function up()
    {
        Schema::table('salary_allowances', function (Blueprint $table) {
            $table->unsignedInteger('salary_template_id');
            $table->foreign('salary_template_id', 'salary_template_fk_2181297')->references('id')->on('salary_templates');
        });
    }
}
