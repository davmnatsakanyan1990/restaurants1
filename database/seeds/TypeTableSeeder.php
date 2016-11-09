<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
           ['name' => 'bakery'],
           ['name' => 'casual dining'],
           ['name' => 'food truck'],
           ['name' => 'café'],
           ['name' => 'quick bites'],
           ['name' => 'noodle shop'],
           ['name' => 'sandwich shop'],
           ['name' => 'fast food'],
           ['name' => 'bar'],
           ['name' => 'fast casual'],
        ]);
    }
}
