<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('contact_name')->nullable();
            $table->string('organization')->nullable();
            $table->integer('imported_from_email')->nullable();
            $table->string('email_integration_uid')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('title')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('facebook')->nullable();
            $table->longText('notes')->nullable();
            $table->string('skype')->nullable();
            $table->string('twitter')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
