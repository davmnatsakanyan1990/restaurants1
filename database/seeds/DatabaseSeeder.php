<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UserTableSeeder::class);
//        $this->call(ServiceTableSeeder::class);
//        $this->call(PlaceTableSeeder::class);
//        $this->call(ImageTableSeeder::class);
//        $this->call(RateTableSeeder::class);
//        $this->call(CommentTableSeeder::class);
//        $this->call(PlaceServiceTableSeeder::class);
//        $this->call(ShareTableSeeder::class);
//        $this->call(MenuTableSeeder::class);
//        $this->call(ProductTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(HighlighTableSeeder::class);
        $this->call(TypeTableSeeder::class);
//        $this->call(AdminTableSeeder::class);
    }
}
