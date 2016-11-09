<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'product 1', 'description' => 'some description', 'price' => '10', 'menu_id' => '1'],
            ['name' => 'product 2', 'description' => 'some description', 'price' => '15', 'menu_id' => '1'],
            ['name' => 'product 3', 'description' => 'some description', 'price' => '14', 'menu_id' => '1'],
            ['name' => 'product 4', 'description' => 'some description', 'price' => '15', 'menu_id' => '1'],
            ['name' => 'product 5', 'description' => 'some description', 'price' => '17', 'menu_id' => '1'],
            ['name' => 'product 6', 'description' => 'some description', 'price' => '17', 'menu_id' => '2'],
            ['name' => 'product 7', 'description' => 'some description', 'price' => '17', 'menu_id' => '2'],
            ['name' => 'product 8', 'description' => 'some description', 'price' => '17', 'menu_id' => '2'],
            ['name' => 'product 9', 'description' => 'some description', 'price' => '17', 'menu_id' => '2'],
            ['name' => 'product 10', 'description' => 'some description', 'price' => '17', 'menu_id' => '3'],
            ['name' => 'product 11', 'description' => 'some description', 'price' => '17', 'menu_id' => '3'],
            ['name' => 'product 12', 'description' => 'some description', 'price' => '17', 'menu_id' => '4'],
            ['name' => 'product 13', 'description' => 'some description', 'price' => '17', 'menu_id' => '4'],
            ['name' => 'product 14', 'description' => 'some description', 'price' => '17', 'menu_id' => '4'],
            ['name' => 'product 15', 'description' => 'some description', 'price' => '17', 'menu_id' => '5'],
            ['name' => 'product 16', 'description' => 'some description', 'price' => '17', 'menu_id' => '6'],
            ['name' => 'product 17', 'description' => 'some description', 'price' => '17', 'menu_id' => '7'],
        ]);
    }
}
