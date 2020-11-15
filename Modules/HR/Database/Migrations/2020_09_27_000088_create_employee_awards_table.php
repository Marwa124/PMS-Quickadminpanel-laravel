<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAwardsTable extends Migration
{
    public function up()
    {
        Schema::create('employee_awards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('gift_item')->nullable();
            $table->decimal('award_amount', 15, 2);
            $table->string('view_status')->nullable();
            $table->date('given_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
