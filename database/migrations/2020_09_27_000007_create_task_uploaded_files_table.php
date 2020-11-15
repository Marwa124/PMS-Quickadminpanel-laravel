<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskUploadedFilesTable extends Migration
{
    public function up()
    {
        Schema::create('task_uploaded_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uploaded_path');
            $table->string('file_name');
            $table->string('is_image');
            $table->integer('image_width')->nullable();
            $table->integer('image_height')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
