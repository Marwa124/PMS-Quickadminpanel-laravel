<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProposalsItemsTable extends Migration
{
    public function up()
    {
        Schema::table('proposals_items', function (Blueprint $table) {
            $table->unsignedInteger('proposals_id');
            $table->foreign('proposals_id', 'proposals_fk_2178422')->references('id')->on('proposals');
        });
    }
}
