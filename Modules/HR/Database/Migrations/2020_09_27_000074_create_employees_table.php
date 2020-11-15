<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->nullable();
            $table->string('activated')->nullable();
            $table->string('banned')->nullable();
            $table->longText('ban_reason')->nullable();
            $table->string('new_password_key')->nullable();
            $table->string('new_password_requested')->nullable();
            $table->string('new_email')->nullable();
            $table->string('last_ip')->nullable();
            $table->datetime('last_login')->nullable();
            $table->string('online_time')->nullable();
            $table->string('active_email')->nullable();
            $table->string('smtp_email_type')->nullable();
            $table->string('smtp_encryption')->nullable();
            $table->string('smtp_action')->nullable();
            $table->string('smtp_host_name')->nullable();
            $table->string('smtp_user_name')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_additional_flag')->nullable();
            $table->string('last_postmaster_run')->nullable();
            $table->string('media_path_slug')->nullable();
            $table->string('marketing_username')->nullable();
            $table->string('marketing_password')->nullable();
            $table->string('marketing_type')->nullable();
            $table->string('sp_username')->nullable();
            $table->string('sp_password')->nullable();
            $table->integer('vacation_balance')->nullable();
            $table->integer('vacation_counterdown')->nullable();
            $table->date('date_of_join')->nullable();
            $table->date('date_of_insurance')->nullable();
            $table->integer('vacation_verified')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
