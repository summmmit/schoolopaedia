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
				'streams_id' => 4,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-18 02:53:03',
				'updated_at' => '2015-03-27 07:23:21',
			),
			1 => 
			array (
				'id' => 2,
				'class' => 'Class - 2',
				'streams_id' => 4,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-18 02:53:15',
				'updated_at' => '2015-03-27 07:23:52',
			),
			2 => 
			array (
				'id' => 3,
				'class' => 'Class - 3',
				'streams_id' => 4,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-18 02:53:25',
				'updated_at' => '2015-03-27 07:23:58',
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
				'streams_id' => 4,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-18 02:53:54',
				'updated_at' => '2015-03-27 07:24:05',
			),
			5 => 
			array (
				'id' => 6,
				'class' => 'Class - 10',
				'streams_id' => 5,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:20:00',
				'updated_at' => '2015-03-27 07:20:00',
			),
			6 => 
			array (
				'id' => 7,
				'class' => 'Class - 10',
				'streams_id' => 6,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:21:23',
				'updated_at' => '2015-03-27 07:21:23',
			),
			7 => 
			array (
				'id' => 8,
				'class' => 'Class - 6',
				'streams_id' => 4,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:21:48',
				'updated_at' => '2015-03-27 07:21:48',
			),
			8 => 
			array (
				'id' => 9,
				'class' => 'Nursery',
				'streams_id' => 4,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:22:35',
				'updated_at' => '2015-03-27 07:22:35',
			),
			9 => 
			array (
				'id' => 10,
				'class' => 'Class - 7',
				'streams_id' => 2,
				'school_id' => 1,
				'deleted_at' => '2015-03-27 07:26:04',
				'created_at' => '2015-03-27 07:24:37',
				'updated_at' => '2015-03-27 07:26:04',
			),
			10 => 
			array (
				'id' => 11,
				'class' => 'Class - 7',
				'streams_id' => 1,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:25:32',
				'updated_at' => '2015-03-27 07:25:32',
			),
			11 => 
			array (
				'id' => 12,
				'class' => 'Class - 7',
				'streams_id' => 2,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:25:45',
				'updated_at' => '2015-03-27 07:25:45',
			),
			12 => 
			array (
				'id' => 13,
				'class' => 'Class - 7',
				'streams_id' => 6,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:26:29',
				'updated_at' => '2015-03-27 07:26:29',
			),
			13 => 
			array (
				'id' => 14,
				'class' => 'Class - 8',
				'streams_id' => 1,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:26:51',
				'updated_at' => '2015-03-27 07:26:51',
			),
			14 => 
			array (
				'id' => 15,
				'class' => 'Class - 9',
				'streams_id' => 3,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:27:06',
				'updated_at' => '2015-03-27 07:27:06',
			),
			15 => 
			array (
				'id' => 16,
				'class' => 'Class - 10',
				'streams_id' => 7,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:27:24',
				'updated_at' => '2015-03-27 07:27:24',
			),
			16 => 
			array (
				'id' => 17,
				'class' => 'Class - 11',
				'streams_id' => 1,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:35:08',
				'updated_at' => '2015-03-27 07:35:08',
			),
			17 => 
			array (
				'id' => 18,
				'class' => 'Class - 11',
				'streams_id' => 2,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:35:29',
				'updated_at' => '2015-03-27 07:35:29',
			),
			18 => 
			array (
				'id' => 19,
				'class' => 'Class - 11',
				'streams_id' => 3,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:35:46',
				'updated_at' => '2015-03-27 07:35:46',
			),
			19 => 
			array (
				'id' => 20,
				'class' => 'Class - 11',
				'streams_id' => 5,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:35:57',
				'updated_at' => '2015-03-27 07:35:57',
			),
			20 => 
			array (
				'id' => 21,
				'class' => 'Class - 11',
				'streams_id' => 6,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:36:09',
				'updated_at' => '2015-03-27 07:36:09',
			),
			21 => 
			array (
				'id' => 22,
				'class' => 'Class - 11',
				'streams_id' => 7,
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:36:18',
				'updated_at' => '2015-03-27 07:36:18',
			),
		));
	}

}
