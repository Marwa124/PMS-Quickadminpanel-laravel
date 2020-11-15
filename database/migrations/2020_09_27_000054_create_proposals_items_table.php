<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsItemsTable extends Migration
{
    public function up()
    {
        Schema::create('proposals_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->longText('description')->nullable();
            $table->string('group_name')->nullable();
            $table->string('brand')->nullable();
            $table->string('delivery');
            $table->string('part');
            $table->float('quantity', 15, 2)->nullable();
            $table->float('unit_cost', 15, 2)->nullable();
            $table->integer('margin')->nullable();
            $table->decimal('selling_price', 15, 2)->nullable();
            $table->decimal('total_cost_price', 15, 2);
            $table->float('tax_rate', 15, 2);
            $table->string('tax_name')->nullable();
            $table->decimal('tax_total', 15, 2)->nullable();
            $table->decimal('tax_cost', 15, 2)->nullable();
            $table->integer('order')->nullable();
            $table->string('unit');
            $table->string('hsn_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
