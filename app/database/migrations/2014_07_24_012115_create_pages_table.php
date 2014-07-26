<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('pages', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name')->unique();
            $table->string('title');
            $table->text('about');
            $table->text('image');
            $table->string('background',40);
            $table->string('copyright');
            $table->text('store_url')->nullable();
            $table->string('phone_color', 20);
            $table->string('text_color', 20);
            $table->string('custom_url')->nullable();
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
		Schema::drop('pages');
	}

}
