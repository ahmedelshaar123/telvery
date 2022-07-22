<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderStatusesTable extends Migration {

	public function up()
	{
		Schema::create('order_statuses', function(Blueprint $table) {
			$table->increments('id');
			$table->enum('status', array('cancelled', 'pending', 'shipped', 'delivered'));
			$table->integer('order_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('order_statuses');
	}
}