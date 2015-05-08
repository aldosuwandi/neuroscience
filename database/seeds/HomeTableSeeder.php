<?php

use Illuminate\Database\Seeder;
use App\Home;

class HomeTableSeeder extends Seeder {


    public function run()
    {
        DB::table('home')->delete();
        Home::create([
            'img_url' => 'banner1.png',
        ]);
        Home::create([
            'img_url' => 'banner2.jpg',
        ]);
    }

}