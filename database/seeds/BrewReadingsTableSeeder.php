<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class BrewReadingsTableSeeder extends Seeder
{
    public function run() {
        $brews = DB::table('brews')->pluck('id');
        $brews->each(function($brewId) {
            for ($time = 0; $time < 6000; $time += 100) {
                factory(\App\BrewReading::class, 1)->create([
                    'time' => $time
                ]);
            }
        });
    }
}
