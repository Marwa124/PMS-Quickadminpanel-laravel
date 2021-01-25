<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalItemTaxsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_item_taxs', function (Blueprint $table) {
            $table->id();
            $table->decimal('tax_cost', 15, 2)->nullable();
            $table->unsignedInteger('taxs_id')->nullable();
            $table->foreign('taxs_id')->references('id')->on('tax_rates')->onDelete('cascade');
            $table->unsignedInteger('proposals_id')->nullable();
            $table->foreign('proposals_id')->references('id')->on('proposals')->onDelete('cascade');
            $table->unsignedInteger('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('item_porposal_relations')->onDelete('cascade');
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
        Schema::dropIfExists('proposal_item_taxs');
    }
}
