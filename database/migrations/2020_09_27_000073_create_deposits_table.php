<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->increments('id');
            $table->date('entry_date')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('title')->nullable();
            $table->text('notes')->nullable();
            $table->enum('status',['paid','non_approved','unpaid'])->default('non_approved')->nullable();
            $table->string('reference')->nullable();
            $table->string('bank_balance')->nullable();



            $table->timestamps();
            $table->softDeletes();
        });
    }
}
