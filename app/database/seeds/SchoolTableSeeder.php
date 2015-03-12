<?php

class SchoolTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('school')->delete();
        
		\DB::table('school')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'DPS Public School',
				'manager_full_name' => 'Sumit Singh',
				'phone_number' => '',
				'email' => '',
				'add_1' => '259/68',
				'add_2' => 'New Defence Colony, Muradnagar',
				'city' => 'Ghaziabad',
				'state' => 'UP',
				'country' => 'India',
				'pin_code' => '',
				'registration_code' => '',
				'code_for_admin' => '',
				'code_for_teachers' => '',
				'code_for_students' => '',
				'registration_date' => '2015-03-06 00:00:00',
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-06 00:00:00',
				'updated_at' => '2015-03-06 00:00:00',
			),
		));
	}

}
