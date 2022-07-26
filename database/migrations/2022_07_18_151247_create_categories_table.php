<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name_ar');
			$table->string('name_en');
			$table->integer('parent_id')->default('0');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}