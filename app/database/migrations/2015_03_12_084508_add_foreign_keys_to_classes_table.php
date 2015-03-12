<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClassesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('classes', function(Blueprint $table)
		{
			$table->foreign('school_id', 'classes_ibfk_1')->references('id')->on('school')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('classes', function(Blueprint $table)
		{
			$table->dropForeign('classes_ibfk_1');
		});
	}

}
