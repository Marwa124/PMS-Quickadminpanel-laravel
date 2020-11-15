<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransfersTable extends Migration
{
    public function up()
    {
        Schema::table('transfers', function (Blueprint $table) {
            $table->unsignedInteger('payment_method_id');
            $table->foreign('payment_method_id', 'payment_method_fk_2179000')->references('id')->on('payment_methods');
        });
    }
}
