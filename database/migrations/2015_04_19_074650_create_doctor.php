<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('doctor', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('birthday');
            $table->string('institution');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->longText('education');
            $table->longText('experience');
            $table->longText('organization');
            $table->longText('training');
            $table->longText('publication');
            $table->string('title');
            $table->string('img_url');
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
        Schema::drop('doctor');
    }

}
