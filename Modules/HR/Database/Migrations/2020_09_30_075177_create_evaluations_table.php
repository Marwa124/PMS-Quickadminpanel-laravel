<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            // $table->enum('type', ['employee_evaluation', 'manager_evaluation'])->default('employee_evaluation');
            $table->string('type')->nullable();
            $table->string('period')->nullable();
            $table->integer('manager_id')->nullable();
            $table->string('date')->nullable();
            $table->float('avg_rate')->nullable();
            $table->text('comment')->nullable();
            $table->text('goal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fingerprint_attendances');
    }
}
