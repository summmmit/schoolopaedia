<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchoolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('school', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 100);
			$table->string('manager_full_name', 60);
			$table->string('add_1', 100);
			$table->string('add_2', 100);
			$table->string('city', 30);
			$table->string('state', 30);
			$table->string('country', 30);
            $table->integer('pin_code');
            $table->text('logo', 65535);
			$table->string('registration_code', 100);
			$table->string('code_for_admin', 100);
			$table->string('code_for_teachers', 100);
			$table->string('code_for_students', 100);
			$table->date('registration_date');
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
		Schema::drop('school');
	}

}
