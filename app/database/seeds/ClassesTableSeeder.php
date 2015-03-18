<?php

class ClassesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('classes')->delete();
        
		\DB::table('classes')->insert(array (
			0 => 
			array (
				'id' => 1,
				'class' => 'Class - 1',
				'streams_id' => 1,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-18 02:53:03',
				'updated_at' => '2015-03-18 02:53:03',
			),
			1 => 
			array (
				'id' => 2,
				'class' => 'Class - 2',
				'streams_id' => 2,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-18 02:53:15',
				'updated_at' => '2015-03-18 02:53:15',
			),
			2 => 
			array (
				'id' => 3,
				'class' => 'Class - 3',
				'streams_id' => 3,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-18 02:53:25',
				'updated_at' => '2015-03-18 02:53:25',
			),
			3 => 
			array (
				'id' => 4,
				'class' => 'Class - 4',
				'streams_id' => 4,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-18 02:53:39',
				'updated_at' => '2015-03-18 02:53:39',
			),
			4 => 
			array (
				'id' => 5,
				'class' => 'Class - 5',
				'streams_id' => 2,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-18 02:53:54',
				'updated_at' => '2015-03-18 02:53:54',
			),
		));
	}

}
