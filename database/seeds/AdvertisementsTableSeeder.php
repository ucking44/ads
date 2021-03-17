<?php

use App\Advertisement;
use App\City;
use App\MainCategory;
use App\States;
use App\SubCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdvertisementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'maincategory_id' => factory(MainCategory::class),
            'subcategory_id' => factory(SubCategory::class),
            'productName' => Str::random(10),
            'yearsOfPurchase' => Str::random(10),
            'expSellPrice' => Str::random(10),
            'name' => Str::random(10),
            'mobile' => Str::random(10),
            'email' => Str::random(10),
            'state' => factory(States::class),
            'city' => factory(City::class),
            'photos' => Str::random(4),
            //'state_id' => Str::random(10),
            // 'email' => Str::random(10).'@gmail.com',
            // 'password' => Hash::make('password'),maincategory_id
        ]);

        // $faker = Factory::create();

        // Advertisement::truncate();

        // foreach(range(1, 20) as $i) {
        //     Advertisement::create([
        //         'maincategory_id' => $faker->maincategory_id,
        //         'subcategory_id' => $faker->subcategory_id,
        //         'productName' => $faker->productName,
        //         'yearsOfPurchase' => $faker->yearsOfPurchase,
        //         'expSellPrice' => $faker->expSellPrice,
        //         'name' => $faker->name,
        //         'mobile' => $faker->mobile,
        //         'email' => $faker->unique()->email,
        //         'state' => $faker->state,
        //         'city' => $faker->city,
        //         'photos' => $faker->photos,
        //     ]);
        // }
    }
}
