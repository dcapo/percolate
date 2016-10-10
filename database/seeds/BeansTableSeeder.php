<?php

namespace Database\Seeds;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BeansTableSeeder extends Seeder
{
    public function run() {
        factory(\App\Bean::class, 10)->create();
    }
}
