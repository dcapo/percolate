<?php

use Illuminate\Database\Seeder;
use Database\Seeds\UsersTableSeeder;
use Database\Seeds\BeansTableSeeder;
use Database\Seeds\RoastsTableSeeder;
use Database\Seeds\BrewStylesTableSeeder;
use Database\Seeds\BrewsTableSeeder;
use Database\Seeds\BrewReadingsTableSeeder;
use Database\Seeds\TastingsTableSeeder;
use Database\Seeds\FlavorsTableSeeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $this->call(UsersTableSeeder::class);
        $this->call(BeansTableSeeder::class);
        $this->call(RoastsTableSeeder::class);
        $this->call(BrewStylesTableSeeder::class);
        $this->call(BrewsTableSeeder::class);
        $this->call(BrewReadingsTableSeeder::class);
        $this->call(TastingsTableSeeder::class);
        $this->call(FlavorsTableSeeder::class);
	}
}
