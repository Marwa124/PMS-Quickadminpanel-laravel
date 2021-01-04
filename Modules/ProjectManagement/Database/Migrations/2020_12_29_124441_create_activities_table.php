<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('module')->nullable();
            $table->unsignedInteger('module_field_id')->nullable();
            $table->string('activity')->nullable();
            $table->timestamp('activity_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('icon')->nullable();
            $table->string('link')->nullable();
            $table->text('value1')->nullable();
            $table->text('value2')->nullable();

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
        Schema::dropIfExists('activities');
    }
}
