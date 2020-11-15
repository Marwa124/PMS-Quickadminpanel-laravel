<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOpportunitiesTable extends Migration
{
    public function up()
    {
        Schema::table('opportunities', function (Blueprint $table) {
            $table->unsignedInteger('lead_id')->nullable();
            $table->foreign('lead_id', 'lead_fk_2172516')->references('id')->on('leads');
        });
    }
}
