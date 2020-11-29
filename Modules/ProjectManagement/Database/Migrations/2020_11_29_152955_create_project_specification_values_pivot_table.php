<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSpecificationValuesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_specification_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('project_specification_id');
            $table->unsignedInteger('subdepartment_id');
//            $table->foreign('project_specification_id')->references('id')->on('project_specification')->onDelete('cascade');
//            $table->foreign('subdepartment_id')->references('id')->on('sub_department')->onDelete('cascade');

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
        Schema::dropIfExists('project_specification_values');
    }
}
