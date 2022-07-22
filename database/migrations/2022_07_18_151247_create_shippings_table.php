<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShippingsTable extends Migration {

	public function up()
	{
		Schema::create('shippings', function(Blueprint $table) {
			$table->increments('id');
			$table->string('address');
			$table->string('zip_code');
			$table->string('phone');
			$table->integer('client_id')->unsigned();
			$table->integer('governorate_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('shippings');
	}
}