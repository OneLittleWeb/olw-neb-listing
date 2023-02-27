<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $categories = [
            ['name' => 'restaurants', 'icon' => 'fa-solid fa-utensils', 'background' => 'bg-1', 'background_image' => 'omaha.jpg'],
            ['name' => 'dog grooming', 'icon' => 'fa-solid fa-dog', 'background' => 'bg-2', 'background_image' => 'omaha.jpg'],
            ['name' => 'plumbers', 'icon' => 'fa-solid fa-wrench', 'background' => 'bg-3', 'background_image' => 'omaha.jpg'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
