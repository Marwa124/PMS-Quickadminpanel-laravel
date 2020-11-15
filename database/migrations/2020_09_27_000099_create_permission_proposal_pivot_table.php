<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionProposalPivotTable extends Migration
{
    public function up()
    {
        Schema::create('permission_proposal', function (Blueprint $table) {
            $table->unsignedInteger('proposal_id');
            $table->foreign('proposal_id', 'proposal_id_fk_2172031')->references('id')->on('proposals')->onDelete('cascade');
            $table->unsignedInteger('permission_id');
            $table->foreign('permission_id', 'permission_id_fk_2172031')->references('id')->on('permissions')->onDelete('cascade');
        });
    }
}
