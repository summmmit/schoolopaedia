<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->foreign('school_id', 'users_ibfk_2')->references('id')->on('school')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('permissions', 'users_ibfk_1')->references('id')->on('groups')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropForeign('users_ibfk_2');
			$table->dropForeign('users_ibfk_1');
		});
	}

}
