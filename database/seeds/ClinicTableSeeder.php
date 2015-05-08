<?php

use Illuminate\Database\Seeder;
use App\Clinic;

class ClinicTableSeeder extends Seeder {


    public function run()
    {
        $statement = "ALTER TABLE clinic  AUTO_INCREMENT = 1;";
        \DB::unprepared($statement);
        DB::table('clinic')->delete();
        Clinic::create([
            'name' => 'Memory Clinic',
            'img_url' => 'clinic1.jpg'
        ]);
        Clinic::create([
            'name' => 'Interventional Pain Clinic',
            'img_url' => 'clinic2.jpg'
        ]);
        Clinic::create([
            'name' => 'Multiple Sclerosis Clinic',
            'img_url' => 'clinic1.jpg'
        ]);
        Clinic::create([
            'name' => 'Stroke Clinic',
            'img_url' => 'clinic2.jpg'
        ]);
        Clinic::create([
            'name' => 'Other Services',
            'img_url' => 'clinic1.jpg'
        ]);
    }

}