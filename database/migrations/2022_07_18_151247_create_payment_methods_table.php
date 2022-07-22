<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentMethodsTable extends Migration {

	public function up()
	{
		Schema::create('payment_methods', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name_ar')->unique();
			$table->string('name_en')->unique();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('payment_methods');
	}
}