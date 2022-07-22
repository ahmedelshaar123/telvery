<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('pin_code')->unique()->nullable();
			$table->boolean('is_active')->default(1);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}