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
            $table->date('recur_start_date')->nullable();
            $table->date('recur_end_date')->nullable();
            $table->string('reference_no')->nullable();
            $table->date('invoice_date')->nullable();
            $table->date('due_date')->nullable();
            $table->integer('alert_overdue')->nullable();
            $table->longText('notes')->nullable();
            $table->float('tax', 15, 2)->nullable();
            $table->string('total_tax')->nullable();
            $table->double('total_amount')->nullable();
            $table->string('adjustment')->nullable();
            $table->string('discount_status')->nullable();
            $table->string('discount_percent')->nullable();
            $table->string('recurring');
            $table->string('recurring_frequency')->nullable();
            $table->string('recur_frequency')->nullable();
            $table->date('recur_next_date')->nullable();
            $table->string('currency')->default('EGP')->nullable();
            $table->enum('status',['cancelled','unpaid','paid','draft','partially_paid','waiting_approval','approved','rejected'])->default('waiting_approval')->nullable();
            $table->integer('archived')->nullable();
            $table->date('date_sent')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
