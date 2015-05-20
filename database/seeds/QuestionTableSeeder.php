<?php

use Illuminate\Database\Seeder;
use App\Question;

class QuestionTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('question')->delete();
        for($i = 1; $i <= 4 ; $i++) {
            for($j = 1; $j <= 4 ; $j++) {
                Question::create([
                    'clinic_id' => $i,
                    'questioner' => $faker->firstName.' '.$faker->lastName,
                    'question_title' => 'Ini title untuk question '.$j,
                    'question_text' => $faker->text(),
                    'answering' => 'Dr '.$faker->firstName.' '.$faker->lastName,
                    'answer_text' => $faker->text(),
                    'published' => true
                ]);
            }
        }

    }

}