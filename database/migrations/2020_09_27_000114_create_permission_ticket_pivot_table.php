<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionTicketPivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_ticket', function (Blueprint $table) {
            $table->unsignedInteger('ticket_id');
            $table->foreign('ticket_id', 'ticket_id_fk_2176650')->references('id')->on('tickets')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2176650')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
