<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJobApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->unsignedInteger('job_circular_id');
            $table->foreign('job_circular_id', 'job_circular_fk_2168799')->references('id')->on('job_circulars');
        });
    }
}
