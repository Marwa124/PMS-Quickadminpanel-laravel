
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserablesTable extends Migration {

	public function up()
	{
		Schema::create('userables', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('userable_id');
			$table->string('userable_type');
			$table->boolean('is_read')->default(0);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('userables');
	}
}
