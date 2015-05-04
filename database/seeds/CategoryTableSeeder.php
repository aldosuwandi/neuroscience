<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder {

    public function run()
    {
        DB::table('category')->delete();
        $statement = "ALTER TABLE category AUTO_INCREMENT = 1;";
        \DB::unprepared($statement);
        for($i = 1; $i <= 5 ; $i++) {
            for($j = 1; $j <= 3 ; $j++) {
                Category::create([
                    'clinic_id' => $i,
                    'name' => 'Category '.$j
                ]);
            }
        }

    }

}