<?php

class SchoolsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('schools')->delete();
        
		\DB::table('schools')->insert(array (
			0 => 
			array (
				'id' => 1,
				'school_name' => 'DPS Public School',
				'manager_full_name' => 'Sumit Singh',
				'phone_number' => '',
				'email' => 'summmmit44@gmail.com',
				'add_1' => '259/68',
				'add_2' => 'New Defence Colony, Muradnagar',
				'city' => 'Ghaziabad',
				'state' => 'UP',
				'country' => 'India',
				'pin_code' => '',
				'registration_code' => '2rZe0GHdTY2vmkbVRzZfnUSPkSBzMmsqofBfGgr9EVhmHAg6HG',
				'code_for_admin' => 'SJANo0hxRce5HlBbhwienb2gjixsKjM7BxCz3Quc90JdNTccrhmPPvlz84pUZPcYnrCspVBGQJxTjeAL',
				'code_for_moderators' => 'SJANo0hxRce5HlBbhwienb2gjixsKjM7BxCz3Quc90JdNTccrhmPPvlz84pUZPcYnrCspVBGQJxTjeAL',
				'code_for_teachers' => 'Sx0z0xUhjKrrtye4s4HHGRwLkD2PFbKhiTHrPTqkn8khNNaOJUgW1yiSpSxS',
				'code_for_parents' => 'SJANo0hxRce5HlBbhwienb2gjixsKjM7BxCz3Quc90JdNTccrhmPPvlz84pUZPcYnrCspVBGQJxTjeAL',
				'code_for_students' => 'h7RuEFNE7IAYJwScImSSNeO5n4ALXAMGlfBlHOM9stviHsD3tQDe2sBeMPxDxlR1R6kgkW',
				'registration_date' => '2015-03-06 00:00:00',
				'logo' => '',
				'active' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-06 00:00:00',
				'updated_at' => '2015-03-06 00:00:00',
			),
			1 => 
			array (
				'id' => 2,
				'school_name' => 'Aum Sun Public School',
				'manager_full_name' => 'Sumit Singh',
				'phone_number' => '05168222541',
				'email' => 'nitinbarotra@gmail.com',
				'add_1' => 'beverly homes 3-12-11',
				'add_2' => 'muradnagar',
				'city' => 'toshima-ku',
				'state' => 'Tokyo',
				'country' => 'Japan',
				'pin_code' => '171-0021',
				'registration_code' => '2rZe0GHdTY2vmkbVRzZfnUSPkSBzMmsqofBfGgr9EVhmHAg6HG',
				'code_for_admin' => 'SJANo0hxRce5HlBbhwienb2gjixsKjM7BxCz3Quc90JdNTccrhmPPvlz84pUZPcYnrCspVBGQJxTjeAL',
				'code_for_moderators' => 'SJANo0hxRce5HlBbhwienb2gjixsKjM7BxCz3Quc90JdNTccrhmPPvlz84pUZPcYnrCspVBGQJxTjeAL',
				'code_for_teachers' => 'Sx0z0xUhjKrrtye4s4HHGRwLkD2PFbKhiTHrPTqkn8khNNaOJUgW1yiSpSxS',
				'code_for_parents' => 'SJANo0hxRce5HlBbhwienb2gjixsKjM7BxCz3Quc90JdNTccrhmPPvlz84pUZPcYnrCspVBGQJxTjeAL',
				'code_for_students' => 'h7RuEFNE7IAYJwScImSSNeO5n4ALXAMGlfBlHOM9stviHsD3tQDe2sBeMPxDxlR1R6kgkW',
				'registration_date' => '2015-04-01 07:16:51',
				'logo' => '',
				'active' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-04-01 07:16:51',
				'updated_at' => '2015-04-01 07:20:00',
			),
			2 => 
			array (
				'id' => 3,
				'school_name' => 'Aum Sun Public School',
				'manager_full_name' => 'Sumit Singh',
				'phone_number' => '05168222541',
				'email' => 'nitin@gmail.com',
				'add_1' => 'beverly homes 3-12-11',
				'add_2' => 'muradnagar',
				'city' => 'toshima-ku',
				'state' => 'Tokyo',
				'country' => 'Japan',
				'pin_code' => '171-0021',
				'registration_code' => 'i8EHPxwXDKoRkTNz9rjxGNE1FXGC2ihf6zVRppMku2KZ6KDtCt',
				'code_for_admin' => 'KoGsdXwtlwrHlVXeCUGDYy1cJdJaufUyvzNz1iFnFQWDLPQw46jMui2maNmERbdMtXyPtRJg1BLjyLoR',
				'code_for_moderators' => 'OFT3t0HXw6ReKJMZ8wDrOFp7yXRRjWUjdvdsSeyAKRbb4XVvbqHgjPibJTxNB4rU8hI7jmHJUkEH3iAnT2IEUkBZL1',
				'code_for_teachers' => 'NQWUoADqOWmucEhLgMMjGJV6EsEYVXni6LVcpm3CeezP4OK39kUSuBy0mG54',
				'code_for_parents' => 'cyj49SNNUITXicTfKiJVuVAcbNytrawFEYPyckDRV1IA0lbFtB7jMLqObolWiY4ySJyWGpNvbgj3zyKWhD4br28kINSJW2F',
				'code_for_students' => 'juVzXbVzj5Oj9qqPUN3J4yifEM0V9EBBYrpt9XV3jUxDy9j8hTG7UcrllH45uP91eNzrKE',
				'registration_date' => '2015-04-01 07:31:27',
				'logo' => '',
				'active' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-04-01 07:31:27',
				'updated_at' => '2015-04-01 07:31:27',
			),
			3 => 
			array (
				'id' => 6,
				'school_name' => 'Kanya Inter College',
				'manager_full_name' => 'Sumit Singh',
				'phone_number' => '05168222541',
				'email' => 'summieesngh@gmail.com',
				'add_1' => 'New Defence Colony',
				'add_2' => 'Muradnagar',
				'city' => 'Toshima-ku Nishi Ikebukuro',
				'state' => 'Tokyo',
				'country' => 'Japan',
				'pin_code' => '201206',
				'registration_code' => 'ZxfwJT4jCVNAN50XE26u0DgSLaonNTCyU4bVYjXyuDOX3jEW9f',
				'code_for_admin' => 'NazOnxm1WHVPEpkFtxQTmyoYofH6otCmL7RaJeuOn8hR5Duib2KtUlPQ9L8dYlsJy1P2989zDBs5Zx9K',
				'code_for_moderators' => 'OFT3t0HXw6ReKJMZ8wDrOFp7yXRRjWUjdvdsSeyAKRbb4XVvbqHgjPibJTxNB4rU8hI7jmHJUkEH3iAnT2IEUkBZL1',
				'code_for_teachers' => '7v2M90HajMDGTaYWR1AuhYZOkrAjrV9nb7VaRmARjQn5xl6gHcI0gkbs94Oy',
				'code_for_parents' => 'cyj49SNNUITXicTfKiJVuVAcbNytrawFEYPyckDRV1IA0lbFtB7jMLqObolWiY4ySJyWGpNvbgj3zyKWhD4br28kINSJW2F',
				'code_for_students' => 'SoQttpTHMoKrcBQumlYsrxJXMF20VqXkss2LjJb3qbbdirXrrutxDBmcN2bcejGwcKw6gD',
				'registration_date' => '2015-04-01 07:40:21',
				'logo' => '',
				'active' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-04-01 07:40:21',
				'updated_at' => '2015-04-01 07:40:21',
			),
		));
	}

}
