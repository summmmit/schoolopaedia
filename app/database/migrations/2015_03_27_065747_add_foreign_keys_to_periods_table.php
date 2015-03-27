<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPeriodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('periods', function(Blueprint $table)
		{
			$table->foreign('school_id', 'periods_ibfk_1')->references('id')->on('school')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('session_id', 'periods_ibfk_2')->references('id')->on('school_session')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('periods', function(Blueprint $table)
		{
			$table->dropForeign('periods_ibfk_1');
			$table->dropForeign('periods_ibfk_2');
		});
	}

}
