<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationFormsTable extends Migration
{
    public function up()
    {
        Schema::create('quotation_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('code');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
