<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPurchaseTable extends Migration
{
    public function up()
    {
        Schema::create('item_purchase', function (Blueprint $table) {
            $table->unsignedInteger('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('proposals_items')->onDelete('cascade');
            $table->unsignedInteger('purchase_id')->nullable();
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');

            $table->string('item_name')->nullable();
            $table->text('item_description')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->string('unit_cost')->nullable();

            $table->float('total', 15, 2)->nullable();
        });
    }
}
