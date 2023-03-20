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
        if ($city) {
            $categories = Category::all();
            $organizations = Organization::where('city_id', $city->id)->get()->groupBy('organization_category');
            return view('category.index', compact('city', 'categories', 'organizations'));
        }

        abort(404);
    }

    public function categoryBusiness(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();

        if ($category) {
            $categories = Category::all();
            $cities = City::all();
            $city = null;
            $organizations = Organization::where('category_id', $category->id)->orderByDesc('rate_stars')->paginate(10)->onEachSide(0);

            return view('organization.index', compact('organizations', 'category', 'categories', 'cities', 'city'));
        } else {
            return $this->othersCategoriesFromBusiness($slug);
        }
    }

    public function othersCategoriesFromBusiness($slug)
    {
        $organizations = Organization::where('organization_category', $slug)->orderByDesc('rate_stars')->paginate(20)->onEachSide(0);

        if ($organizations) {
            $cities = City::all();
            $categories = Category::all();

            $business_category = Organization::where('organization_category', $slug)->first();
            $category = Category::find($business_category->category_id);

            $business_city = Organization::where('organization_category', $slug)->first();
            $city = City::find($business_city->city_id);

            return view('category.business', compact('organizations', 'city', 'cities', 'category', 'categories'));
        }

        abort(404);
    }

    public function allCategories()
    {
        $categories = Category::all();
        return view('category.all-categories', compact('categories'));
    }
}
