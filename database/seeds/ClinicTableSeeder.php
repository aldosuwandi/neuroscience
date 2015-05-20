<?php

use Illuminate\Database\Seeder;
use App\Clinic;

class ClinicTableSeeder extends Seeder {


    public function run()
    {
        $statement = "ALTER TABLE clinic  AUTO_INCREMENT = 1;";
        $faker = Faker\Factory::create();
        \DB::unprepared($statement);
        DB::table('clinic')->delete();
        Clinic::create([
            'name' => 'Memory Clinic',
            'img_url' => 'Memory-clinic.jpg',
            'description' => 'Klinik yang bertujuan untuk melakukan pemeriksaan yang menyeluruh terhadap fungsi kognitif otak sehingga dapat mendiagnosa, mendeteksi dini dan mengobati gangguan memori'
        ]);
        Clinic::create([
            'name' => 'Interventional Pain Clinic',
            'img_url' => 'pain.jpg',
            'description' => 'Klinik nyeri yang secara khusus  melakukan diagnosa dan pengobatan nyeri dengan metode intervensi'
        ]);
        Clinic::create([
            'name' => 'Multiple Sclerosis Clinic',
            'img_url' => 'multiple-sclerosis-ipad.jpg',
            'description' => 'Klinik yang secara komprehensif dan multidisiplin melakukan pemeriksaan dan pengobatan penyakit Multple Sclerosis'
        ]);
//        Clinic::create([
//            'name' => 'Stroke Clinic',
//            'img_url' => 'stroke.jpg',
//            'description' => $faker->text()
//
//        ]);
        Clinic::create([
            'name' => 'Other Services',
            'img_url' => 'tools.jpg',
            'description' => 'Not Available'

        ]);
    }

}