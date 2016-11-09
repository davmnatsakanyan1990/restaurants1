<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            ['name' => 'service 1'],
            ['name' => 'service 2'],
            ['name' => 'service 3'],
            ['name' => 'service 4'],
            ['name' => 'service 5'],
            ['name' => 'service 6'],
        ]);
    }
}
