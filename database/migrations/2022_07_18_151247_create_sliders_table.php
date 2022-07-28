<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSlidersTable extends Migration {

	public function up()
	{
		Schema::create('sliders', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title_ar')->nullable();
			$table->string('title_en')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sliders');
	}
}
