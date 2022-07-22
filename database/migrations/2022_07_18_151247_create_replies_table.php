<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepliesTable extends Migration {

	public function up()
	{
		Schema::create('replies', function(Blueprint $table) {
			$table->increments('id');
			$table->text('reply');
			$table->integer('client_id')->unsigned();
			$table->integer('review_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('replies');
	}
}