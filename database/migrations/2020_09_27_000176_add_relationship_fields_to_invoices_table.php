<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedInteger('client_id');
            $table->foreign('client_id', 'client_fk_2177095')->references('id')->on('clients');
            $table->unsignedInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_2177096')->references('id')->on('projects');
        });
    }
}
