<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Organization;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $major_cities = City::where('is_major', 1)->get();
        $popular_cities = City::take(8)->orderByDesc('population')->get();
        $cities = City::all();

        return view('home', compact('categories', 'major_cities', 'popular_cities', 'cities'));
    }

    public function search(Request $request)
    {
        $search = $request->looking_for;
        $search_location = $request->search_location;
        $search_category = $request->search_category;

        $organizations = Organization::where('organization_name', 'like', '%' . $search . '%')
            ->orWhere('organization_category', 'like', '%' . $search . '%')
            ->where('city_id', 'like', '%' . $search_location . '%')
            ->where('category_id', 'like', '%' . $search_category . '%')
            ->paginate(20)->withQueryString()->onEachSide(0);

        return view('organization.index', compact('organizations', 'search'));
    }
}
