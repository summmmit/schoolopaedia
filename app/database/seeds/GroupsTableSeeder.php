<?php

class GroupsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('groups')->delete();
        
		\DB::table('groups')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'students',
				'permissions' => '',
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			1 => 
			array (
				'id' => 2,
				'name' => 'administratior',
				'permissions' => '',
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
		));
	}

}
