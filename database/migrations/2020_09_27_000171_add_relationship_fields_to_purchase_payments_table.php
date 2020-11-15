<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPurchasePaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('purchase_payments', function (Blueprint $table) {
            $table->unsignedInteger('purchase_id')->nullable();
            $table->foreign('purchase_id', 'purchase_fk_2178631')->references('id')->on('purchases');
            $table->unsignedInteger('account_id')->nullable();
            $table->foreign('account_id', 'account_fk_2178639')->references('id')->on('accounts');
            $table->unsignedInteger('transaction_id')->nullable();
            $table->foreign('transaction_id', 'transaction_fk_2178995')->references('id')->on('transactions');
        });
    }
}
