<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class FlavorsTableSeeder extends Seeder
{
    public function run() {
        $tastings = DB::table('tastings')->pluck('id');
        $tastings->each(function($tastingId) {
            factory(\App\Flavor::class, 5)->create([
                'tasting_id' => $tastingId
            ]);
        });
    }
}
