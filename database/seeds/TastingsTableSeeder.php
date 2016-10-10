<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class TastingsTableSeeder extends Seeder
{
    public function run() {
        $faker = Faker::create();

        $brews = DB::table('brews')->pluck('id');
        $users = DB::table('users')->pluck('id')->toArray();
        $taster = $faker->randomElement($users);

        $brews->each(function($brewId) use ($taster) {
            factory(\App\Tasting::class, 1)->create([
                'user_id' => $taster
            ]);
        });
    }
}
