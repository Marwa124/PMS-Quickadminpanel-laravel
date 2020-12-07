<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLeadsTable extends Migration
{
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
            $table->unsignedInteger('salutation_id')->nullable();
            $table->foreign('salutation_id', 'salutation_fk_2172442')->references('id')->on('salutations');
            $table->unsignedInteger('interested_id')->nullable();
            $table->foreign('interested_id', 'interested_fk_2172443')->references('id')->on('interested_ins');
            $table->unsignedInteger('lead_status_id')->nullable();
            $table->foreign('lead_status_id', 'lead_status_fk_2172445')->references('id')->on('lead_statuses');
            $table->unsignedInteger('lead_source_id')->nullable();
            $table->foreign('lead_source_id', 'lead_source_fk_2172446')->references('id')->on('lead_sources');
            $table->unsignedInteger('lead_category_id')->nullable();
            $table->foreign('lead_category_id', 'lead_category_fk_2172447')->references('id')->on('lead_categories');
        });
    }
}
