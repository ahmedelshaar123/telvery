<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name_ar');
			$table->string('name_en');
			$table->integer('best_seller')->default('0');
			$table->string('type')->nullable();
			$table->string('color');
			$table->integer('in_stock');
			$table->double('price_before');
			$table->double('price_after')->default('0');
			$table->string('sku')->nullable();
			$table->text('detail_ar');
			$table->text('detail_en');
			$table->text('specification_ar');
			$table->text('specification_en');
			$table->string('video_url')->nullable();
			$table->boolean('black_friday')->default(0);
			$table->boolean('today_deal')->default(0);
			$table->integer('views')->default('0');
			$table->integer('brand_id')->unsigned()->nullable();
			$table->integer('category_id')->unsigned();
			$table->bigInteger('user_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}
