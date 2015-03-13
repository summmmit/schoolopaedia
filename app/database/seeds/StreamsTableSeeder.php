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
				'stream_name' => 'Science',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-12 00:00:00',
				'updated_at' => '2015-03-12 00:00:00',
			),
			1 => 
			array (
				'id' => 2,
				'stream_name' => 'Comerce',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-12 00:00:00',
				'updated_at' => '2015-03-12 00:00:00',
			),
			2 => 
			array (
				'id' => 43,
				'stream_name' => 'Arts',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-12 07:43:09',
				'updated_at' => '2015-03-12 07:43:09',
			),
			3 => 
			array (
				'id' => 44,
				'stream_name' => 'sss',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-12 07:43:50',
				'updated_at' => '2015-03-12 07:43:50',
			),
			4 => 
			array (
				'id' => 45,
				'stream_name' => 'asdgasdgasdg',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-12 08:07:54',
				'updated_at' => '2015-03-12 08:07:54',
			)
		));
	}

}
