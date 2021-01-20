<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkTrackingsTable extends Migration
{
    public function up()
    {
        Schema::create('work_trackings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('achievement')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->longText('description')->nullable();
            $table->string('notify_work_achive')->nullable();
            $table->string('notify_work_not_achive')->nullable();
            $table->string('email_send')->nullable();
            $table->unsignedInteger('work_type_id');
            $table->unsignedInteger('account_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
