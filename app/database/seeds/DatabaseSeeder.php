<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();

        $this->call('UserTableSeeder');

        $this->command->info('User table seeded!');
    	$this->call('UsersTableSeeder');
		$this->call('ClassesTableSeeder');
		$this->call('GroupsTableSeeder');
		$this->call('PeriodsTableSeeder');
		$this->call('SchoolTableSeeder');
		$this->call('SchoolSessionTableSeeder');
		$this->call('SectionsTableSeeder');
		$this->call('StreamsTableSeeder');
		$this->call('SubjectsTableSeeder');
		$this->call('UsersToClassTableSeeder');
		$this->call('SchoolsTableSeeder');
	}

}
