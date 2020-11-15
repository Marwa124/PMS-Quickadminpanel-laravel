<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_no')->nullable();
            $table->string('subject');
            $table->string('module')->nullable();
            $table->date('proposal_date');
            $table->date('expire_date')->nullable();
            $table->integer('alert_overdue')->nullable();
            $table->string('currency')->nullable();
            $table->longText('notes')->nullable();
            $table->string('total_tax')->nullable();
            $table->decimal('total_cost_price', 15, 2)->nullable();
            $table->decimal('tax', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->date('date_sent')->nullable();
            $table->string('proposal_deleted')->nullable();
            $table->string('emailed')->nullable();
            $table->string('show_client')->nullable();
            $table->string('convert')->nullable();
            $table->string('convert_module')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
