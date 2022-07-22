<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReactionsTable extends Migration {

	public function up()
	{
		Schema::create('reactions', function(Blueprint $table) {
			$table->increments('id');
			$table->enum('type', array('0', '1', '2'));
			$table->integer('client_id')->unsigned();
			$table->integer('review_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('reactions');
	}
}