<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
			$table->increments('id');
			$table->string('question_ar');
			$table->string('question_en');
			$table->text('answer_ar');
			$table->text('answer_en');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('questions');
	}
}