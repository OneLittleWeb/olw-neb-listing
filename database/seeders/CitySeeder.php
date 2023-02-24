<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();

        $cities = [
            ['name' => 'Omaha', 'is_major' => 1, 'population' => 488059, 'background_image' => 'omaha.jpg'],
            ['name' => 'Lincoln', 'is_major' => 1, 'population' => 289136, 'background_image' => 'lincoln.jpg'],
            ['name' => 'Bellevue', 'is_major' => 1, 'population' => 62888, 'background_image' => 'bellevue.jpg'],
            ['name' => 'Grand Island', 'is_major' => 1, 'population' => 52755, 'background_image' => 'cat-img-2.jpg'],
            ['name' => 'Kearney', 'is_major' => 0, 'population' => 33558, 'background_image' => 'cat-img-2.jpg'],
            ['name' => 'Fremont', 'is_major' => 0, 'population' => 27245, 'background_image' => 'cat-img-2.jpg'],
            ['name' => 'Hastings', 'is_major' => 0, 'population' => 25247, 'background_image' => 'cat-img-2.jpg'],
            ['name' => 'Norfolk', 'is_major' => 0, 'population' => 24964, 'background_image' => 'cat-img-2.jpg'],
            ['name' => 'Columbus', 'is_major' => 0, 'population' => 23954, 'background_image' => 'cat-img-2.jpg'],
            ['name' => 'Papillion', 'is_major' => 0, 'population' => 23875, 'background_image' => 'cat-img-2.jpg'],
            ['name' => 'North Platte', 'is_major' => 0, 'population' => 23543, 'background_image' => 'cat-img-2.jpg'],
        ];
        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
