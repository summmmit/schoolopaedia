<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersToClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_to_class', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('user_id')->index('user_id');
			$table->integer('class_id')->index('class_id');
			$table->dateTime('deleted_at');
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
		Schema::drop('users_to_class');
	}

}
