<?php

class SubjectsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('subjects')->delete();
        
		\DB::table('subjects')->insert(array (
			0 => 
			array (
				'id' => 1,
				'subject_name' => 'Hindi',
				'subject_code' => 'CS0001',
				'class_id' => 9,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:30:55',
				'updated_at' => '2015-03-27 07:30:55',
			),
			1 => 
			array (
				'id' => 2,
				'subject_name' => 'English',
				'subject_code' => 'CS0002',
				'class_id' => 9,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:31:10',
				'updated_at' => '2015-03-27 07:31:10',
			),
			2 => 
			array (
				'id' => 3,
				'subject_name' => 'Mathematics',
				'subject_code' => 'CS0003',
				'class_id' => 9,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:31:28',
				'updated_at' => '2015-03-27 07:31:28',
			),
			3 => 
			array (
				'id' => 4,
				'subject_name' => 'Hindi',
				'subject_code' => 'CS0101',
				'class_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:31:45',
				'updated_at' => '2015-03-27 07:31:45',
			),
			4 => 
			array (
				'id' => 5,
				'subject_name' => 'English',
				'subject_code' => 'CS0102',
				'class_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:31:56',
				'updated_at' => '2015-03-27 07:31:56',
			),
			5 => 
			array (
				'id' => 6,
				'subject_name' => 'Mathematics',
				'subject_code' => 'CS0103',
				'class_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:32:12',
				'updated_at' => '2015-03-27 07:32:12',
			),
			6 => 
			array (
				'id' => 7,
				'subject_name' => 'Hindi',
				'subject_code' => 'CS1001',
				'class_id' => 6,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:33:37',
				'updated_at' => '2015-03-27 07:33:37',
			),
			7 => 
			array (
				'id' => 8,
				'subject_name' => 'English',
				'subject_code' => 'CS1002',
				'class_id' => 6,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:33:50',
				'updated_at' => '2015-03-27 07:33:50',
			),
			8 => 
			array (
				'id' => 9,
				'subject_name' => 'Mathematics',
				'subject_code' => 'CS1003',
				'class_id' => 6,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:34:06',
				'updated_at' => '2015-03-27 07:34:06',
			),
			9 => 
			array (
				'id' => 10,
				'subject_name' => 'Science',
				'subject_code' => 'CS1004',
				'class_id' => 6,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:34:19',
				'updated_at' => '2015-03-27 07:34:19',
			),
			10 => 
			array (
				'id' => 11,
				'subject_name' => 'Social Science',
				'subject_code' => 'CS1005',
				'class_id' => 6,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:34:40',
				'updated_at' => '2015-03-27 07:34:40',
			),
			11 => 
			array (
				'id' => 12,
				'subject_name' => 'Hindi',
				'subject_code' => 'CS0601',
				'class_id' => 8,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:39:24',
				'updated_at' => '2015-03-27 07:39:24',
			),
			12 => 
			array (
				'id' => 13,
				'subject_name' => 'Hindi',
				'subject_code' => 'CS0711',
				'class_id' => 12,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-27 07:40:10',
				'updated_at' => '2015-03-27 07:40:10',
			),
		));
	}

}
