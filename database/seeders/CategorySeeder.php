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
            ['name' => 'Restaurants', 'icon' => 'fa-solid fa-utensils', 'background' => 'bg-1'],
            ['name' => 'Dog Grooming', 'icon' => 'fa-solid fa-dog', 'background' => 'bg-2'],
            ['name' => 'Plumbers', 'icon' => 'fa-solid fa-wrench', 'background' => 'bg-3'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
