<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJobCircularsTable extends Migration
{
    public function up()
    {
        Schema::table('job_circulars', function (Blueprint $table) {
            $table->unsignedInteger('designation_id')->nullable();
            $table->foreign('designation_id', 'designation_fk_2168603')->references('id')->on('designations');
        });
    }
}
