<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class RoastsTableSeeder extends Seeder
{
    public function run() {
        $beans = DB::table('beans')->pluck('id');
        $beans->each(function($beanId) {
            factory(\App\Roast::class, 1)->create([
                'bean_id' => $beanId
            ]);
        });
    }
}
