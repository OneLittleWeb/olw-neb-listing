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
        DB::table('categories')->delete();

        $categories = [
            ['name' => 'Dog Grooming'],
            ['name' => 'Restaurants'],
            ['name' => 'Plumbers'],
        ];
        Category::insert($categories);
    }
}
