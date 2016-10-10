<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BrewStylesTableSeeder extends Seeder
{
    public function run() {
        factory(\App\BrewStyle::class, 5)->create();
    }
}
