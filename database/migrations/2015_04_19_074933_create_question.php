<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestion extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('question', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('clinic_id')->unsigned();
            $table->foreign('clinic_id')->references('id')->on('clinic')->onDelete('cascade');
            $table->string('questioner');
            $table->string('question_title');
            $table->longText('question_text');
            $table->string('answering');
            $table->longText('answer_text')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('question');
	}

}
