<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users')->delete();
        
		\DB::table('users')->insert(array (
			0 => 
			array (
				'id' => 14,
				'first_name' => 'Sumit',
				'middle_name' => '',
				'last_name' => 'Prasad',
				'voter_id' => 'cCHzFniZhT',
				'email' => 'summmmit44@gmail.com',
				'email_updated_at' => '2015-02-27 06:41:21',
				'password' => '$2y$10$lc3MO0UKO3r7Mq13FyYJ3.vpUGcnpEDmJqjkj5rXz294i17KsPAUy',
				'password_temp' => '',
				'password_updated_at' => '2015-02-27 06:41:21',
				'code' => '',
				'active' => 1,
				'dob' => '0000-00-00',
				'sex' => 1,
				'marriage_status' => 0,
				'relative_id' => '',
				'relation_with_person' => 0,
				'mobile_number' => 0,
				'mobile_verified' => 0,
				'mobile_updated_at' => '0000-00-00 00:00:00',
				'home_number' => 0,
				'add_1' => '',
				'add_2' => '',
				'city' => 'ghaziabad',
				'state' => 'uttar pradesh',
				'country' => '',
				'pin_code' => '',
				'address_updated_at' => '2015-02-27 06:41:21',
				'pic' => '',
				'pic_updated_at' => '0000-00-00 00:00:00',
				'permissions' => 2,
				'school_id' => 1,
				'newsletter' => 0,
				'remember_token' => 'E23uLmpcp8uTPe5nQuGOOEVkXBPK7RVPHU3hx8aoLQiW3gBIKmHNRdncYlew',
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-02-26 21:41:21',
				'updated_at' => '2015-03-01 23:51:40',
			),
		));
	}

}
