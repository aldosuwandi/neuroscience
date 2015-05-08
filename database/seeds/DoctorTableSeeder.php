<?php

use Illuminate\Database\Seeder;
use App\Doctor;

class DoctorTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('doctor')->delete();
        for($i = 0; $i <= 6 ; $i++) {
            Doctor::create([
                'name' => 'Dr '.$faker->firstName.' '.$faker->lastName,
                'title' => 'Title Doctor '.$i,
                'img_url' => 'doctor1.png'
            ]);
        }

    }

}