<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWorkTrackingsTable extends Migration
{
    public function up()
    {
        Schema::table('work_trackings', function (Blueprint $table) {
            $table->unsignedInteger('work_type_id');
            $table->foreign('work_type_id', 'work_type_fk_2176406')->references('id')->on('time_work_types');
            $table->unsignedInteger('account_id')->nullable();
            $table->foreign('account_id', 'account_fk_2176507')->references('id')->on('accounts');
        });
    }
}
