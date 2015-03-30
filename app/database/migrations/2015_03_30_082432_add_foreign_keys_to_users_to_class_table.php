<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersToClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_to_class', function(Blueprint $table)
		{
			$table->foreign('class_id', 'users_to_class_ibfk_2')->references('id')->on('classes')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'users_to_class_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_to_class', function(Blueprint $table)
		{
			$table->dropForeign('users_to_class_ibfk_2');
			$table->dropForeign('users_to_class_ibfk_1');
		});
	}

}
