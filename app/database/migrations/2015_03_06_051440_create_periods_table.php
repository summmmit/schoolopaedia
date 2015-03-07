<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeriodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('periods', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('period', 5);
			$table->time('start_time');
			$table->time('end_time');
			$table->integer('session_id')->index('session_id');
			$table->integer('school_id')->index('school_id');
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
		Schema::drop('periods');
	}

}
