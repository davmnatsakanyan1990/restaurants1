<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('place_services')->insert([
            ['place_id' => '1', 'service_id' => '1'],
            ['place_id' => '2', 'service_id' => '3'],
            ['place_id' => '3', 'service_id' => '2'],
            ['place_id' => '1', 'service_id' => '4'],
        ]);
    }
}
