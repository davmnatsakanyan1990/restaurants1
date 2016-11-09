<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            ['name' => 'rest1.jpg', 'imageable_id' => '1', 'imageable_type' => 'App\Models\Place'],
            ['name' => 'rest2.jpg', 'imageable_id' => '1', 'imageable_type' => 'App\Models\Place'],
            ['name' => 'rest3.jpg', 'imageable_id' => '1', 'imageable_type' => 'App\Models\Place'],
            ['name' => 'rest4.jpg', 'imageable_id' => '1', 'imageable_type' => 'App\Models\Place'],
            ['name' => 'rest5.jpg', 'imageable_id' => '1', 'imageable_type' => 'App\Models\Place'],
            ['name' => 'rest6.jpg', 'imageable_id' => '1', 'imageable_type' => 'App\Models\Share'],
        ]);
    }
}
