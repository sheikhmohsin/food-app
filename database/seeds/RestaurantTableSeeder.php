<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            [
                "id" => 1,
                "name" => "Restaurants",
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);

        DB::table('sub_categories')->truncate();
        DB::table('sub_categories')->insert([
            [
                "id" => 1,
                "name" => "Restaurants",
                "category_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);

        DB::table('cities')->truncate();
        DB::table('cities')->insert([
            [
                "id" => 1,
                "name" => "Lahore",
                "state_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);

        DB::table('states')->truncate();
        DB::table('states')->insert([
            [
                "id" => 1,
                "name" => "Punjab",
                "country_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);

        DB::table('countries')->truncate();
        DB::table('countries')->insert([
            [
                "id" => 1,
                "name" => "Pakistan",
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);

        DB::table('tags')->truncate();
        DB::table('tags')->insert([
            [
                "id" => 1,
                "name" => "sea food",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 2,
                "name" => "pizza",
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);

        DB::table('restaurants')->truncate();
        DB::table('restaurants')->insert([
            [
                "id" => 1,
                "name" => "Yum Yum Sushi House",
                "description" => "Yet to be discussed",
                "average_rating" => 4.5,
                "business_start_time" => 39600,
                "business_end_time" => 79200,
                "price_rank" => 2,
                "category_id" => 1,
                "sub_category_id" => 1,
                "primary_contact" => "03001234567",
                "secondary_contacts" => json_encode([
                    "03009876543",
                    "03007863898"
                ]),
                "working_days" => json_encode(["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]),
                "website" => "https://www.sample.com",
                "lng" => 31.5204,
                "lat" => -74.3587,
                "city_id" => 1,
                "state_id" => 1,
                "country_id" => 1,
                "address" => "2032 Union St San Francisco, CA 94123",
                "menu" => json_encode(["https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg"]),
                "cover_image" => "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                "photos" => json_encode(["https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg"]),
                "is_active" => true,
                "published_at" => "2018-11-23 14:05:23",
                "created_at" => "2018-11-23 14:05:23",
                "updated_at" => "2018-11-23 14:05:23"
            ]
        ]);

        DB::table('restaurant_tags')->truncate();
        DB::table('restaurant_tags')->insert([
            [
                "id" => 1,
                "restaurant_id" => 1,
                "tag_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "id" => 2,
                "restaurant_id" => 1,
                "tag_id" => 2,
                "created_at" => now(),
                "updated_at" => now()
            ]
        ]);
    }
}
