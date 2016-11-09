<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'user 1', 'email' => 'user1@gmail.com', 'password' => '123456'],
            ['name' => 'user 2', 'email' => 'user2@gmail.com', 'password' => '123456'],
            ['name' => 'user 3', 'email' => 'user3@gmail.com', 'password' => '123456'],
            ['name' => 'user 4', 'email' => 'user4@gmail.com', 'password' => '123456'],
        ]);
    }
}
