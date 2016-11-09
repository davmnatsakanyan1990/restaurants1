<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HighlighTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('highlights')->insert([
            ['name' => 'Takeout Available'],
            ['name' => 'Full Bar Available'],
            ['name' => 'Outdoor Seating'],
            ['name' => 'Private Dining Area Available'],
            ['name' => 'Gluten Free Options'],
            ['name' => 'Nightlife'],
            ['name' => 'Online Bookings'],
            ['name' => 'Happy Hours'],
            ['name' => 'Wifi'],
            ['name' => 'Sports Bars'],
            ['name' => 'Live Music'],
            ['name' => 'Brunch'],
            ['name' => 'Kid Friendly'],
            ['name' => 'Vegan Options'],
            ['name' => 'Delivery'],
            ['name' => 'Vegetarian Friendly'],
            ['name' => 'Breakfast'],
            ['name' => 'BYOB Only'],
            ['name' => 'Dog Friendly'],
            ['name' => 'Serves Alcohol'],
        ]);
    }
}
