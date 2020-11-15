<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('recur_start_date');
            $table->date('recur_end_date');
            $table->string('reference_no')->nullable();
            $table->date('invoice_date')->nullable();
            $table->date('due_date')->nullable();
            $table->integer('alert_overdue')->nullable();
            $table->longText('notes')->nullable();
            $table->float('tax', 15, 2);
            $table->string('total_tax')->nullable();
            $table->integer('discount_percent')->nullable();
            $table->string('recurring');
            $table->string('recurring_frequency')->nullable();
            $table->string('recur_frequency')->nullable();
            $table->date('recur_next_date')->nullable();
            $table->string('currerncy');
            $table->string('status');
            $table->integer('archived')->nullable();
            $table->date('date_sent')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
