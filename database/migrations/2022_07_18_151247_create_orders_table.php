<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->double('total_price');
			$table->double('delivery_cost');
			$table->string('transaction_id')->nullable();
			$table->integer('client_id')->unsigned();
			$table->integer('coupon_id')->unsigned();
			$table->integer('shipping_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}