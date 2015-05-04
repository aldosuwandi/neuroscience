<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventTableSeeder extends Seeder {


    public function run()
    {
        DB::table('event')->delete();
        for($i = 0; $i <= 5 ; $i++) {
            Event::create([
                'img_url' => 'dummy_image.jpg',
                'link' => 'dummy_link'
            ]);
        }

    }

}