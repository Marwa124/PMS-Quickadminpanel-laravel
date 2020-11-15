<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->unsignedInteger('invoice_id');
            $table->foreign('invoice_id', 'invoice_fk_2178715')->references('id')->on('invoices');
            $table->unsignedInteger('account_id')->nullable();
            $table->foreign('account_id', 'account_fk_2178723')->references('id')->on('accounts');
            $table->unsignedInteger('transaction_id')->nullable();
            $table->foreign('transaction_id', 'transaction_fk_2178994')->references('id')->on('transactions');
        });
    }
}
