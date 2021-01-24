<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDepositsTable extends Migration
{
    public function up()
    {
        Schema::table('deposits', function (Blueprint $table) {
            $table->unsignedInteger('deposit_category_id')->nullable();
            $table->foreign('deposit_category_id', 'deposit_category_fk_2281155')->references('id')->on('deposit_categories');
            $table->unsignedInteger('paid_by_id')->nullable();
            $table->foreign('paid_by_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->unsignedInteger('account_id')->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->unsignedInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');

        });
    }
}
