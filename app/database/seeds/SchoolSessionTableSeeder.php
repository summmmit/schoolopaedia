<?php

class SchoolSessionTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('school_session')->delete();
        
	}

}
