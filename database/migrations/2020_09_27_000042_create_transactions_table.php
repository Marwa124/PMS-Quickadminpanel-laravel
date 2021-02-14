<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->integer('paid_by')->nullable();
            $table->string('reference')->nullable();
            $table->string('status')->nullable();
            $table->longText('notes')->nullable();
            $table->string('tags')->nullable();
            $table->float('tax', 15, 2)->nullable();
            $table->date('date')->nullable();
            $table->float('debit', 15, 2)->nullable();
            $table->float('credit', 15, 2)->nullable();
            $table->float('total_balance', 15, 2)->nullable();
            $table->string('client_visible')->nullable();
            $table->integer('added_by')->nullable();
            $table->integer('paid')->nullable();
            $table->string('billable')->nullable();
            $table->string('deposit')->nullable();
            $table->string('deposit_2')->nullable();
            $table->string('under_55')->nullable();
            $table->unsignedInteger('project_id')->nullable();
            $table->unsignedInteger('account_id')->nullable();
            $table->unsignedInteger('invoice_id')->nullable();
            $table->unsignedInteger('payment_id')->nullable();
            $table->unsignedInteger('expense_id')->nullable();
            $table->unsignedInteger('deposit_id')->nullable();
            $table->unsignedInteger('transfer_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
