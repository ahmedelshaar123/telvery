<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaticPagesTable extends Migration {

	public function up()
	{
		Schema::create('static_pages', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name_ar');
			$table->string('name_en');
			$table->text('value_ar');
			$table->text('value_en');
			$table->string('key')->unique();
			$table->string('type');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('static_pages');
	}
}