<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryCostsTable extends Migration {

	public function up()
	{
		Schema::create('delivery_costs', function(Blueprint $table) {
			$table->increments('id');
			$table->double('price');
			$table->integer('product_id')->unsigned();
			$table->integer('governorate_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('delivery_costs');
	}
}