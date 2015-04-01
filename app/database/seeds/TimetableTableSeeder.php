<?php

class TimetableTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('timetable')->delete();
        
		\DB::table('timetable')->insert(array (
			0 => 
			array (
				'id' => 33,
				'start_time' => '11:26:00',
				'end_time' => '11:26:00',
				'classes_id' => 2,
				'subject_id' => 14,
				'users_id' => 15,
				'deleted_at' => '2015-04-01 03:15:33',
				'created_at' => '2015-04-01 01:26:43',
				'updated_at' => '2015-04-01 03:15:33',
			),
			1 => 
			array (
				'id' => 34,
				'start_time' => '17:27:00',
				'end_time' => '18:27:00',
				'classes_id' => 2,
				'subject_id' => 14,
				'users_id' => 15,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-04-01 01:27:14',
				'updated_at' => '2015-04-01 01:27:14',
			),
			2 => 
			array (
				'id' => 35,
				'start_time' => '11:28:00',
				'end_time' => '14:28:00',
				'classes_id' => 1,
				'subject_id' => 5,
				'users_id' => 15,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-04-01 01:28:55',
				'updated_at' => '2015-04-01 01:28:55',
			),
			3 => 
			array (
				'id' => 36,
				'start_time' => '10:57:00',
				'end_time' => '10:57:00',
				'classes_id' => 1,
				'subject_id' => 4,
				'users_id' => 14,
				'deleted_at' => '2015-04-01 03:16:00',
				'created_at' => '2015-04-01 01:42:54',
				'updated_at' => '2015-04-01 03:16:00',
			),
			4 => 
			array (
				'id' => 37,
				'start_time' => '11:43:00',
				'end_time' => '12:43:00',
				'classes_id' => 1,
				'subject_id' => 4,
				'users_id' => 15,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-04-01 01:43:35',
				'updated_at' => '2015-04-01 01:43:35',
			),
			5 => 
			array (
				'id' => 38,
				'start_time' => '11:44:00',
				'end_time' => '12:44:00',
				'classes_id' => 2,
				'subject_id' => 14,
				'users_id' => 14,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-04-01 01:44:48',
				'updated_at' => '2015-04-01 01:44:48',
			),
			6 => 
			array (
				'id' => 39,
				'start_time' => '12:20:00',
				'end_time' => '12:20:00',
				'classes_id' => 1,
				'subject_id' => 4,
				'users_id' => 14,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-04-01 03:20:50',
				'updated_at' => '2015-04-01 03:20:50',
			),
			7 => 
			array (
				'id' => 40,
				'start_time' => '13:29:00',
				'end_time' => '14:29:00',
				'classes_id' => 1,
				'subject_id' => 5,
				'users_id' => 15,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-04-01 03:30:25',
				'updated_at' => '2015-04-01 03:30:25',
			),
		));
	}

}
