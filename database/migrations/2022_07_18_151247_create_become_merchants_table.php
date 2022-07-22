<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBecomeMerchantsTable extends Migration {

	public function up()
	{
		Schema::create('become_merchants', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('phone')->unique();
			$table->boolean('is_active')->default(0);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('become_merchants');
	}
}