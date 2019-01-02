<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->text('description')->nullable();
            $table->float('average_rating')->default(0);
            $table->integer('business_start_time')->nullable();
            $table->integer('business_end_time')->nullable();
            $table->integer('price_rank');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->string('primary_contact');
            $table->json('secondary_contacts')->nullable();
            $table->json('working_days')->nullable();
            $table->string('website')->nullable();
            $table->decimal('lng', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->integer('city_id');
            $table->integer('state_id')->nullable();
            $table->integer('country_id');
            $table->string('address', 500);
            $table->json('menu')->nullable();
            $table->string('cover_image', 500)->nullable();
            $table->json('photos')->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_hidden')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->integer('published_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant');
    }
}
