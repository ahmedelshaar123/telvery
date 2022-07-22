<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponsTable extends Migration {

	public function up()
	{
		Schema::create('coupons', function(Blueprint $table) {
			$table->increments('id');
			$table->string('code')->unique();
			$table->integer('num_users')->nullable();
			$table->date('expiry_date')->nullable();
			$table->double('discount');
			$table->integer('brand_id')->unsigned()->nullable();
			$table->bigInteger('user_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('coupons');
	}
}
