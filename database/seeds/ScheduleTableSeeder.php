<?php

use Illuminate\Database\Seeder;
use App\Schedule;

class ScheduleTableSeeder extends Seeder {


    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('schedule')->delete();
        for($i = 0; $i <= 10 ; $i++) {
            Schedule::create([
                'name' => 'Dr '.$faker->firstName.' '.$faker->lastName,
                'clinic' => 'Clinic '.$i,
                'day' => $faker->randomElement(['Senin','Selasa','Rabu','Kamis','Jumat']),
                'time' => $faker->randomElement(['01.00 - 02.00','02.00 - 03.00','04.00 - 05.00','07.00 - 08.00','
                    09.00 - 10.00'])
            ]);
        }

    }

}