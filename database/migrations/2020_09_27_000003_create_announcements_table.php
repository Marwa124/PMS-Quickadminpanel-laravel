<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('status');
            $table->integer('view_status');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('all_client')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
