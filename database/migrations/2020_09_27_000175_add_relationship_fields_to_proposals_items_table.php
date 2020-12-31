<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProposalsItemsTable extends Migration
{
    public function up()
    {
        Schema::table('proposals_items', function (Blueprint $table) {
            $table->unsignedInteger('customer_group_id');
            $table->foreign('customer_group_id')->references('id')->on('customer_groups');
            $table->unsignedInteger('tax_id')->nullable();
            $table->foreign('tax_id')->references('id')->on('tax_rates');
        });
    }
}
