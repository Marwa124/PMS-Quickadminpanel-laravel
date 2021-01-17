<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPorposalRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_porposal_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->longText('description')->nullable();
            $table->string('group_name')->nullable();
            $table->string('brand')->nullable();
            $table->string('delivery')->nullable();
            $table->string('part')->nullable();
            $table->float('quantity', 15, 2)->nullable();
            $table->float('unit_cost', 15, 2)->nullable();
            $table->integer('margin')->nullable();
            $table->decimal('selling_price', 15, 2)->nullable();
            $table->decimal('total_cost_price', 15, 2);
            $table->float('tax_rate', 15, 2)->nullable();
            $table->string('tax_name')->nullable();
            $table->decimal('tax_total', 15, 2)->nullable();
            $table->decimal('tax_cost', 15, 2)->nullable();
            $table->integer('order')->nullable();
            $table->string('unit')->nullable();
            $table->string('hsn_code')->nullable();
            $table->unsignedInteger('proposals_id')->nullable();
            $table->foreign('proposals_id')->references('id')->on('proposals')->onDelete('cascade');
            $table->unsignedInteger('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('proposals_items')->onDelete('cascade');
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
        Schema::dropIfExists('item_porposal_relations');
    }
}
