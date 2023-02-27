<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Organization;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();

        return view('city.index', compact('cities'));
    }

    public function cityCategory($slug)
    {
        $city = City::where('slug', $slug)->first();
        $categories = Category::all();

        $organizations  = Organization::where('city_id', $city->id)->get()->groupBy('organization_category');
        return view('city.category', compact('city', 'categories','organizations'));
    }
}
