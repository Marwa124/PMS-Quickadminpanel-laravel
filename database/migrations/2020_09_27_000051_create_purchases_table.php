<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_no')->nullable();
            $table->float('total', 15, 2)->nullable();
            $table->string('update_stock')->nullable();
            $table->string('status')->nullable();
            $table->string('emailed')->nullable();
            $table->date('date_sent')->nullable();
            $table->integer('created_by')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('discount_type')->nullable();
            $table->float('discount_percent', 15, 2)->nullable();
            $table->float('adjustment', 15, 2)->nullable();
            $table->float('discount_total', 15, 2)->nullable();
            $table->string('show_quantity_as')->nullable();
            $table->string('total_tax')->nullable();
            $table->float('tax', 15, 2)->nullable();
            $table->longText('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
