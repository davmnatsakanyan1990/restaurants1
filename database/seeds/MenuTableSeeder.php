<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            ['name' => 'menu 1', 'place_id' => '1'],
            ['name' => 'menu 2', 'place_id' => '1'],
            ['name' => 'menu 3', 'place_id' => '1'],
            ['name' => 'menu 4', 'place_id' => '1'],
            ['name' => 'menu 5', 'place_id' => '1'],
            ['name' => 'menu 7', 'place_id' => '1'],
            ['name' => 'menu 8', 'place_id' => '2'],
            ['name' => 'menu 9', 'place_id' => '2'],
            ['name' => 'menu 10', 'place_id' => '2'],
            ['name' => 'menu 11', 'place_id' => '3'],
            ['name' => 'menu 12', 'place_id' => '3'],
        ]);
    }
}
