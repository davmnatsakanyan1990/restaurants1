<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            ['text' => 'comment 1', 'user_id' => '1', 'place_id' => '1'],
            ['text' => 'comment 2', 'user_id' => '2', 'place_id' => '2'],
            ['text' => 'comment 3', 'user_id' => '3', 'place_id' => '1'],
            ['text' => 'comment 4', 'user_id' => '2', 'place_id' => '3'],
        ]);
    }
}
