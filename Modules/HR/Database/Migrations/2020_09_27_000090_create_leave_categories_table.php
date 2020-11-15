<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('leave_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('leave_quota')->nullable();
            $table->float('deducted_amount')->nullable();
            $table->float('annual_monthly')->nullable()->comment('annually=1 monthly=0');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
