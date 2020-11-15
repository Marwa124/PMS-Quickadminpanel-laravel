<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTransactionsTable extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_2178818')->references('id')->on('projects');
            $table->unsignedInteger('account_id');
            $table->foreign('account_id', 'account_fk_2178819')->references('id')->on('accounts');
            $table->unsignedInteger('invoice_id');
            $table->foreign('invoice_id', 'invoice_fk_2178820')->references('id')->on('invoices');
            $table->unsignedInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id', 'payment_method_fk_2178823')->references('id')->on('payment_methods');
            $table->unsignedInteger('expense_category_id')->nullable();
            $table->foreign('expense_category_id', 'expense_category_fk_2281170')->references('id')->on('expense_categories');
        });
    }
}
