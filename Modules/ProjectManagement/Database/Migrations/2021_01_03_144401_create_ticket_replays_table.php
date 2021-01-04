<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketReplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_replays', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ticket_id')->nullable();
            $table->unsignedInteger('ticket_replay_id')->nullable();
            $table->text('body')->nullable();
            $table->unsignedInteger('replier_id')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_replays');
    }
}
