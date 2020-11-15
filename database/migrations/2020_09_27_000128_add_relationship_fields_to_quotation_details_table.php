<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuotationDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('quotation_details', function (Blueprint $table) {
            $table->unsignedInteger('quotation_id');
            $table->foreign('quotation_id', 'quotation_fk_2182711')->references('id')->on('quotations');
        });
    }
}
