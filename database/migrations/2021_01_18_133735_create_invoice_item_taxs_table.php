<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemTaxsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_item_taxs', function (Blueprint $table) {
            $table->id();
            $table->decimal('tax_cost', 15, 2)->nullable();

            $table->unsignedInteger('taxs_id')->nullable();
            $table->foreign('taxs_id')->references('id')->on('tax_rates')->onDelete('cascade');

            $table->unsignedInteger('invoices_id')->nullable();
            $table->foreign('invoices_id')->references('id')->on('invoices')->onDelete('cascade');

            $table->unsignedInteger('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('item_invoice_relations')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_item_taxs');
    }
}
