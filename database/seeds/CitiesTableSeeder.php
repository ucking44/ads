<?php

use App\City;
use App\States;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'cityName' => Str::random(10),
            'state_id' => factory(States::class),
            // 'email' => Str::random(10).'@gmail.com',
            // 'password' => Hash::make('password'),maincategory_id
        ]);

        // $faker = Factory::create();

        // City::truncate();

        // foreach(range(1, 100) as $i) {
        //     City::create([
        //         'cityName' => $faker->cityName,
        //         'state_id' => $faker->state_id,
        //     ]);
        // }
    }
}
