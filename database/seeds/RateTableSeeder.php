<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
            ['user_id' => '1', 'place_id' => '1', 'mark' => '4'],
            ['user_id' => '2', 'place_id' => '2', 'mark' => '4'],
            ['user_id' => '3', 'place_id' => '3', 'mark' => '5'],
            ['user_id' => '4', 'place_id' => '1', 'mark' => '5'],
        ]);
    }
}
