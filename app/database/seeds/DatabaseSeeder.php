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
		$this->call('StreamsTableSeeder');
		$this->call('ClassesTableSeeder');
		$this->call('SchoolTableSeeder');
		$this->call('GroupsTableSeeder');
		$this->call('SchoolSessionTableSeeder');
	}

}
