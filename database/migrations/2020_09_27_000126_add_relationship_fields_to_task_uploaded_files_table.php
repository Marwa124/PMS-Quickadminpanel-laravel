<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTaskUploadedFilesTable extends Migration
{
    public function up()
    {
        Schema::table('task_uploaded_files', function (Blueprint $table) {
            $table->unsignedInteger('task_attachment_id');
            $table->foreign('task_attachment_id', 'task_attachment_fk_2182421')->references('id')->on('task_attachments');
        });
    }
}
