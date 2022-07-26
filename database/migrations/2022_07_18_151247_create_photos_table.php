<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotosTable extends Migration {

	public function up()
	{
		Schema::create('photos', function(Blueprint $table) {
			$table->increments('id');
			$table->string('path');
			$table->enum('type', array('image', 'images', '3d'));
			$table->integer('photoable_id');
			$table->string('photoable_type');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('photos');
	}
}
