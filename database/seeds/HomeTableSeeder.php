<?php

use Illuminate\Database\Seeder;
use App\Home;

class HomeTableSeeder extends Seeder {


    public function run()
    {
        DB::table('home')->delete();
        for($i = 0; $i <= 5 ; $i++) {
            Home::create([
                'img_url' => 'dummy_image.jpg',
            ]);
        }

    }

}