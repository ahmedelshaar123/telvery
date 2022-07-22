<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscriptionsTable extends Migration {

	public function up()
	{
		Schema::create('subscriptions', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('subscriptions');
	}
}