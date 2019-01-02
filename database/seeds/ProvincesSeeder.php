<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->truncate();
        DB::table('states')->insert([
            ['id' => 1, 'name' => 'Sindh', 'country_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Punjab', 'country_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Khyber Pakhtunkhwa', 'country_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Balochistan', 'country_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Islamabad', 'country_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Azad Kashmir', 'country_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Gilgit-Baltistan', 'country_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Federally Administered Tribal Areas', 'country_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
