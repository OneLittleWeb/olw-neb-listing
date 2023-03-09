<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Organization;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $city = City::where('slug', $slug)->first();
        $categories = Category::all();

        $organizations  = Organization::where('city_id', $city->id)->get()->groupBy('organization_category');
        return view('category.index', compact('city', 'categories','organizations'));
    }

    public function categoryBusiness($slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category) {
            $categories = Category::all();
            $cities = City::all();
            $city = null;
            $organizations = Organization::where('category_id', $category->id)->orderByDesc('rate_stars')->paginate(10)->onEachSide(0);

            return view('organization.index', compact('organizations', 'category', 'categories', 'cities', 'city'));
        }

        abort(404);
    }
}
