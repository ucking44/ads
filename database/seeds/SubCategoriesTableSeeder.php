<?php

use App\MainCategory;
use App\SubCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $factory->define(App\SubCategory::class, function ($faker) {
        //     return [
        //         'subcategory' => $faker->subcategory,
        //         //'content' => $faker->paragraph,
        //         'maincategory_id' => factory(App\MainCategory::class),
        //     ];
        // });

        DB::table('sub_categories')->insert([
            'subcategory' => Str::random(10),
            'maincategory_id' => factory(MainCategory::class),
            // 'email' => Str::random(10).'@gmail.com',factory(App\User::class),
            // 'password' => Hash::make('password'),maincategory_id
        ]);

        // $faker = Factory::create();

        // SubCategory::truncate();

        // foreach(range(1, 20) as $i) {
        //     SubCategory::create([
        //         'subcategory' => Str::random(10),
        //         'maincategory_id' => factory(App\MainCategory::class),
        //     ]);
        // }
    }
}
