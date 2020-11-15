<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('assigned_by')->nullable();
            $table->string('training_name')->nullable();
            $table->string('vendor_name')->nullable();
            $table->date('start_date');
            $table->date('finish_date')->nullable();
            $table->decimal('training_cost', 15, 2)->nullable();
            $table->string('status')->nullable();
            $table->string('performance')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
