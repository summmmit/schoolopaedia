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
				'class' => 'class-1',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-06 00:00:00',
				'updated_at' => '2015-03-06 00:00:00',
			),
			1 => 
			array (
				'id' => 2,
				'class' => 'class-2',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			2 => 
			array (
				'id' => 3,
				'class' => 'class-3',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '0000-00-00 00:00:00',
				'updated_at' => '0000-00-00 00:00:00',
			),
			3 => 
			array (
				'id' => 4,
				'class' => 'class-4',
				'school_id' => 1,
				'deleted_at' => '0000-00-00 00:00:00',
				'created_at' => '2015-03-12 00:49:18',
				'updated_at' => '2015-03-12 00:49:18',
			),
		));
	}

}
