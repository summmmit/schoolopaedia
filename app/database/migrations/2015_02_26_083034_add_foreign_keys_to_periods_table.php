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
			$table->foreign('school_id', 'periods_ibfk_1')->references('id')->on('schools')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
		});
	}

}
