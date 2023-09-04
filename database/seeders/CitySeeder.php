<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        City::factory()->create([
            "name" => "Bangkok",
            "country_id" => 2,
            "city_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        City::factory()->create([
            "name" => "Chiang Mai",
            "country_id" => 2,
            "city_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        City::factory()->create([
            "name" => "Phuket",
            "country_id" => 2,
            "city_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        City::factory()->create([
            "name" => "Koh Samui",
            "country_id" => 2,
            "city_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);



        City::factory()->create([
            "name" => "Hanoi",
            "country_id" => 3,
            "city_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        City::factory()->create([
            "name" => "Halong Bay",
            "country_id" => 3,
            "city_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        City::factory()->create([
            "name" => "Hoi An",
            "country_id" => 3,
            "city_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        City::factory()->create([
            "name" => "Ho Chi Minh City",
            "country_id" => 3,
            "city_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        City::factory()->create([
            "name" => "Hue",
            "country_id" => 3,
            "city_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);


        City::factory()->create([
            "name" => "Yangon",
            "country_id" => 1,
            "city_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);
    }
}
