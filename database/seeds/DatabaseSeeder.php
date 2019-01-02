<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RestaurantTableSeeder::class);
         $this->call(CountriesSeeder::class);
         $this->call(ProvincesSeeder::class);
         $this->call(CitiesSeeder::class);
    }
}
