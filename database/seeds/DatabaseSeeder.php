<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Model::unguard();
        $this->call('ClinicTableSeeder');
        $this->call('CategoryTableSeeder');
//        $this->call('PostTableSeeder');
        $this->call('HomeTableSeeder');
        $this->call('EventTableSeeder');
        $this->call('QuestionTableSeeder');
        $this->call('ScheduleTableSeeder');
        $this->call('DoctorTableSeeder');
    }

}
