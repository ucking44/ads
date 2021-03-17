<?php

use App\MainCategory;
use Faker\Factory;
//use Carbon\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MainCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_categories')->insert([
            'maincategory' => Str::random(10),
            // 'email' => Str::random(10).'@gmail.com',
            // 'password' => Hash::make('password'),
        ]);


        // $faker = Factory::create();

        // MainCategory::truncate();

        // foreach(range(1, 20) as $i) {
        //     MainCategory::create([
        //         'maincategory' => $faker->maincategory,
        //     ]);
        //}
    }
}
