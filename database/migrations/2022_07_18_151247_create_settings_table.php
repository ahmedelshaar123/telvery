<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name_ar');
			$table->string('name_en');
			$table->string('value_ar')->nullable();
			$table->string('value_en')->nullable();
			$table->string('key')->unique();
			$table->string('type');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}