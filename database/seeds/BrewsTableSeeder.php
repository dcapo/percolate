<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class BrewsTableSeeder extends Seeder
{
    public function run() {
        $faker = Faker::create();

        $roasts = DB::table('roasts')->pluck('id');
        $brewTypes = DB::table('brew_styles')->pluck('id')->toArray();

        $roasts->each(function($roastId) use ($faker, $brewTypes) {
            factory(\App\Brew::class, 1)->create([
                'roast_id' => $roastId,
                'brew_style_id' => $faker->randomElement($brewTypes)
            ]);
            factory(\App\Brew::class, 1)->create([
                'roast_id' => $roastId,
                'brew_style_id' => $faker->randomElement($brewTypes)
            ]);
        });
    }
}
