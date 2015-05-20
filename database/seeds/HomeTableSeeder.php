<?php

use Illuminate\Database\Seeder;
use App\Home;

class HomeTableSeeder extends Seeder {


    public function run()
    {
        DB::table('home')->delete();
        Home::create([
            'title' => 'example',
            'caption' => 'example',
            'link' => 'example',
            'img_url' => 'banner1.png',
        ]);
        Home::create([
            'title' => 'example',
            'caption' => 'example',
            'link' => 'example',
            'img_url' => 'banner2.jpg',
        ]);
    }

}