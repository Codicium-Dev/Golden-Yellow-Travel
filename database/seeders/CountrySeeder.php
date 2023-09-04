<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = ["Myanmar", "Thailand", "Vietnam"];
        $arr = [];
        foreach ($countries as $country) {
            $arr[] = [
                "name" => $country,
                "country_photo" => "https://www.vhv.rs/dpng/d/476-4764937_insert-image-here-icon-hd-png-download.png",
                "updated_at" => now(),
                "created_at" => now(),
            ];
        }
        Country::insert($arr);
    }
}
