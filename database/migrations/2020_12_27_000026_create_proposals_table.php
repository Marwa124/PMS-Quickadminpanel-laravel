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
            $table->string('module')->nullable();//client or oppertinate
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
            $table->string('convert')->nullable();//yes or no 
            $table->string('convert_module')->nullable();//invoice
            $table->integer('module_id')->nullable();//id of client or oppertinate
            $table->integer('convert_module_id')->nullable();//id of invoice
            $table->date('converted_date')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('discount_percent')->nullable();
            $table->decimal('after_discount', 15, 2)->nullable();
            $table->decimal('discount_total', 15, 2)->nullable();
            $table->decimal('adjustment', 15, 2)->nullable();//addtionnal values
            $table->string('show_quantity_as')->nullable();
            $table->string('allowed_cmments')->nullable();
            $table->Text('proposal_validity')->nullable();
            $table->Text('materials_supply_delivery')->nullable();
            $table->Text('warranty')->nullable();
            $table->Text('prices')->nullable();
            $table->longText('payment_terms')->nullable();
            $table->Text('maintenance_service_contract')->nullable();

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }
}
