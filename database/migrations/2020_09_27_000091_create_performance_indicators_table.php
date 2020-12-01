<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceIndicatorsTable extends Migration
{
    public function up()
    {
        Schema::create('performance_indicators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_technical_experience')->nullable();
            $table->string('marketing')->nullable();
            $table->string('management')->nullable();
            $table->string('administration')->nullable();
            $table->string('presentation_skill')->nullable();
            $table->string('quantity_of_work')->nullable();
            $table->string('efficiency')->nullable();
            $table->string('integrity')->nullable();
            $table->string('profissionalism')->nullable();
            $table->string('team_work')->nullable();
            $table->string('critical_thinking')->nullable();
            $table->string('conflict_management')->nullable();
            $table->string('attendance')->nullable();
            $table->string('ability_to_meet_deadline')->nullable();
            $table->unsignedInteger('designation_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
