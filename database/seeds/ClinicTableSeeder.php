<?php

use Illuminate\Database\Seeder;
use App\Clinic;

class ClinicTableSeeder extends Seeder {


    public function run()
    {
        $faker = Faker\Factory::create();
        $statement = "ALTER TABLE clinic  AUTO_INCREMENT = 1;";
        \DB::unprepared($statement);
        DB::table('clinic')->delete();
        for($i = 1; $i <= 5 ; $i++) {
            Clinic::create([
                'name' => 'Clinic '.$i,
                'description' => $faker->text()
            ]);
        }

    }

}