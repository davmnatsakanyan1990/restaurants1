<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'breakfast'],
            ['name' => 'lunch'],
            ['name' => 'dine out'],
            ['name' => 'delivery'],
            ['name' => 'drinks and nightlife'],
            ['name' => 'take away'],
        ]);
    }
}
