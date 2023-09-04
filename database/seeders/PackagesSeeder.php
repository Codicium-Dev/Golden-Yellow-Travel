<?php

namespace Database\Seeders;

use App\Models\Packages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Packages::factory()->create([
            "name" => "Luxury Tours",
            "country_id" => 2,
            "package_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        Packages::factory()->create([
            "name" => "Family Tours",
            "country_id" => 2,
            "package_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        Packages::factory()->create([
            "name" => "Honeymoon Package Tours",
            "country_id" => 2,
            "package_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        Packages::factory()->create([
            "name" => "Beach Holiday Tours",
            "country_id" => 2,
            "package_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        Packages::factory()->create([
            "name" => "Private Tours",
            "country_id" => 2,
            "package_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);



        Packages::factory()->create([
            "name" => "Family Holiday Tours",
            "country_id" => 3,
            "package_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        Packages::factory()->create([
            "name" => "Luxury Tours",
            "country_id" => 3,
            "package_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        Packages::factory()->create([
            "name" => "Private Tours",
            "country_id" => 3,
            "package_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        Packages::factory()->create([
            "name" => "Small Group Tours",
            "country_id" => 3,
            "package_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);

        Packages::factory()->create([
            "name" => "Beach Holiday Tours",
            "country_id" => 3,
            "package_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);


        Packages::factory()->create([
            "name" => "Family Holiday Tours",
            "country_id" => 1,
            "package_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
            "updated_at" => now(),
            "created_at" => now(),
        ]);
    }
}
