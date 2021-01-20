<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->date('entry_date')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('title')->nullable();
            $table->text('notes')->nullable();
            $table->enum('status',['paid','non_approved','unpaid'])->nullable();
            $table->string('reference')->nullable();



            $table->timestamps();
            $table->softDeletes();
        });
    }
}
