<?php

class StreamsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('streams')->delete();
        
		\DB::table('streams')->insert(array (
			0 => 
			array (
				'id' => 1,
				'stream_name' => 'Arts',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-18 02:52:13',
				'updated_at' => '2015-03-18 02:52:13',
			),
			1 => 
			array (
				'id' => 2,
				'stream_name' => 'Science',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-18 02:52:23',
				'updated_at' => '2015-03-18 02:52:23',
			),
			2 => 
			array (
				'id' => 3,
				'stream_name' => 'Commerce',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-18 02:52:31',
				'updated_at' => '2015-03-18 02:52:31',
			),
			3 => 
			array (
				'id' => 4,
				'stream_name' => 'None',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-18 02:52:39',
				'updated_at' => '2015-03-18 02:52:39',
			),
			4 => 
			array (
				'id' => 5,
				'stream_name' => 'Biology',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:18:04',
				'updated_at' => '2015-03-27 07:18:04',
			),
			5 => 
			array (
				'id' => 6,
				'stream_name' => 'Computer Science',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:19:08',
				'updated_at' => '2015-03-27 07:19:08',
			),
			6 => 
			array (
				'id' => 7,
				'stream_name' => 'Information Technology',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:19:30',
				'updated_at' => '2015-03-27 07:19:30',
			),
		));
	}

}
