<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->truncate();
        DB::table('countries')->insert([
            ['id' => 1, 'name' => 'Pakistan', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
