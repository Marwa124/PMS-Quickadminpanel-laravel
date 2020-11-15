<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('primary_contact')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->longText('short_note')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('currency')->nullable();
            $table->string('skype')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('language')->nullable();
            $table->string('country')->nullable();
            $table->string('vat')->nullable();
            $table->string('hosting_company')->nullable();
            $table->string('hostname')->nullable();
            $table->string('port')->nullable();
            $table->string('password')->nullable();
            $table->string('username')->nullable();
            $table->string('photo')->nullable();
            $table->tinyInteger('client_status')->default(1)->comment('my comment');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
