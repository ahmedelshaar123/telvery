<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLinkedProductsTable extends Migration {

	public function up()
	{
		Schema::create('linked_products', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('linked_product_id')->unsigned();
			$table->enum('type', array('color', 'product', 'size'));
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('linked_products');
	}
}