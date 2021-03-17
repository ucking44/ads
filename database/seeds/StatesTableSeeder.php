<?php

use App\States;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'stateName' => Str::random(10),
            //'maincategory_id' => Str::random(10),
            // 'email' => Str::random(10).'@gmail.com',
            // 'password' => Hash::make('password'),maincategory_id
        ]);


        // $faker = Factory::create();

        // States::truncate();

        // foreach(range(1, 50) as $i) {
        //     States::create([
        //         'stateName' => $faker->stateName,
        //     ]);
        // }
    }
}
