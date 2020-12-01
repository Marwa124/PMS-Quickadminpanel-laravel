<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('purchase_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_method')->nullable();
            $table->string('amount')->nullable();
            $table->string('currency')->nullable();
            $table->longText('notes')->nullable();
            $table->date('payment_date')->nullable();
            $table->integer('paid_to')->nullable();
            $table->integer('paid_by')->nullable();
            $table->unsignedInteger('purchase_id')->nullable();
            $table->unsignedInteger('account_id')->nullable();
            $table->unsignedInteger('transaction_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
