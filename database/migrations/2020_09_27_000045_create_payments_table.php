<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payer_email')->nullable();
            $table->string('payment_method')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('currency')->nullable();
            $table->longText('notes')->nullable();
            $table->date('payment_date')->nullable();
            $table->integer('paid_by')->nullable();
            $table->unsignedInteger('invoice_id');
            $table->unsignedInteger('account_id')->nullable();
            $table->unsignedInteger('transaction_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
