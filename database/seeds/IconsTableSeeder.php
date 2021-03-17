<?php

use App\Icon;
use App\MainCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class IconsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('icons')->insert([
            'icons' => Str::random(10),
            'category_id' => factory(MainCategory::class),
            // 'email' => Str::random(10).'@gmail.com',
            // 'password' => Hash::make('password'),maincategory_id
        ]);

        // $faker = Factory::create();

        // Icon::truncate();

        // foreach(range(1, 50) as $i) {
        //     Icon::create([
        //         'icons' => $faker->icons,
        //         'category_id' => $faker->category_id,
        //     ]);
        // }
    }
}
