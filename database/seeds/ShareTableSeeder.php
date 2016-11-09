<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShareTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shares')->insert([
            ['title' => 'share 1', 'content' => 'share content 1', 'location' => 'share 1 location', 'wrk_hrs_from' => '12:00:00', 'wrk_hrs_to' => '18:00:00', 'place_id' => '1'],
            ['title' => 'share 2', 'content' => 'share content 2', 'location' => 'share 2 location', 'wrk_hrs_from' => '13:00:00', 'wrk_hrs_to' => '19:00:00', 'place_id' => '2'],
            ['title' => 'share 3', 'content' => 'share content 3', 'location' => 'share 3 location', 'wrk_hrs_from' => '10:00:00', 'wrk_hrs_to' => '20:00:00', 'place_id' => '1'],
            ['title' => 'share 4', 'content' => 'share content 4', 'location' => 'share 4 location', 'wrk_hrs_from' => '14:00:00', 'wrk_hrs_to' => '21:00:00', 'place_id' => '1'],
            ['title' => 'share 5', 'content' => 'share content 5', 'location' => 'share 5 location', 'wrk_hrs_from' => '14:00:00', 'wrk_hrs_to' => '21:00:00', 'place_id' => '1'],
        ]);
    }
}
