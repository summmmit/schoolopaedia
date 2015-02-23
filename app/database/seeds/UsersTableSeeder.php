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
				'id' => 2,
				'first_name' => 'Sumit',
				'middle_name' => '',
				'last_name' => 'Prasad',
				'voter_id' => '9zV2NvbWSH',
				'email' => 'summmmit44@gmail.com',
				'email_updated_at' => '0000-00-00 00:00:00',
				'password' => '$2y$10$sO7f3c8uFNcnoObOcTZffepui4aQl18pqUxovcqTTde2pcKue5JIK',
				'password_temp' => '',
				'password_updated_at' => '2015-02-18 15:44:00',
				'code' => '',
				'active' => 1,
				'dob' => '1991-05-25',
				'sex' => 1,
				'marriage_status' => 0,
				'relative_id' => 'Suraj Prasad',
				'relation_with_person' => 0,
				'mobile_number' => 1234567890,
				'mobile_verified' => 0,
				'mobile_updated_at' => '2015-02-18 15:26:18',
				'home_number' => 987654321,
				'add_1' => 'h.no-269,st.no-9',
				'add_2' => 'new defence colony,muradnagar',
				'city' => 'ghaziabad',
				'state' => '',
				'country' => 'IND',
				'pin_code' => '201206',
				'address_updated_at' => '2015-02-18 15:25:39',
				'pic' => '4ad86788defbbc9dee1176eb675e22d1.jpeg',
				'pic_updated_at' => '2015-02-18 15:40:01',
                'permissions' => 2,
				'newsletter' => 0,
				'remember_token' => 'hFRzh92PTFJ6QA0vM6szVZ5DqaBY1OoNEY5ncZJTDcDguxVxpOAbtIapbDuE',
				'created_at' => '2015-02-18 15:14:57',
				'updated_at' => '2015-02-18 15:57:15',
			),
		));
	}

}
