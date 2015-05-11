<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventTableSeeder extends Seeder {


    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('event')->delete();
        for($i = 0; $i <= 5 ; $i++) {
            Event::create([
                'img_url' => 'event.jpg',
                'name' => 'Event '.$i,
                'text' => $faker->text()
            ]);
        }

    }

}