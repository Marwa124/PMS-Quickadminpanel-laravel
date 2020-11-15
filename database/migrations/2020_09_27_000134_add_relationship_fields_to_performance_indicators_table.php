<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPerformanceIndicatorsTable extends Migration
{
    public function up()
    {
        Schema::table('performance_indicators', function (Blueprint $table) {
            $table->unsignedInteger('designation_id');
            $table->foreign('designation_id', 'designation_fk_2182562')->references('id')->on('designations');
        });
    }
}
