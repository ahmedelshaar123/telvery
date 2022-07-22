<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhotosTable extends Migration {

	public function up()
	{
		Schema::create('photos', function(Blueprint $table) {
			$table->increments('id');
			$table->string('path');
			$table->enum('type', array('3d', 'image'));
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