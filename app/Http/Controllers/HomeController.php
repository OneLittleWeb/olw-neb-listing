<?php

namespace App\Http\Controllers;

use App\Http\Controllers\OrganizationController;
use App\Models\Category;
use App\Models\City;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::orderByDesc('id')->get();
        $major_cities = City::where('is_major', 1)->get();
        $popular_cities = City::take(8)->orderByDesc('population')->get();
        $cities = City::all();

        return view('home', compact('categories', 'major_cities', 'popular_cities', 'cities'));
    }

    public function autocomplete(Request $request)
    {
        $query = $request->search;

        $organizations = DB::table('organizations')
            ->select(DB::raw('"organizations" as source'), 'id', 'organization_name')
            ->where('organization_name', 'like', '%' . $query . '%');

        $categories = DB::table('categories')
            ->select(DB::raw('"categories" as source'), 'id', 'name')
            ->where('name', 'like', '%' . $query . '%');

        $results = $categories->union($organizations)->get();

        return response()->json($results);
    }

    public function search(Request $request)
    {
        if ($request->looking_for) {
            $source = $request->source_value;
            $search_city = $request->search_city;
            $search_source_id = $request->source_id;
            $city = City::find($search_city);
            $category = Category::find($search_source_id);

            $category->meta_title = Str::title($category->name) . ' in ' . Str::title($city->name) . ', NE | nebraskalisting.com';

            if ($source == 'organizations') {

                $sourceController = new OrganizationController();
                return $sourceController->cityWiseOrganization($city->slug, $category->slug);

            } elseif ($source == 'categories') {

                $cities = City::all();
                $categories = Category::all();
                $organizations = Organization::where('category_id', $search_source_id)
                    ->where('city_id', $search_city)
                    ->paginate(20)
                    ->withQueryString()
                    ->onEachSide(0);

                return view('organization.index', compact('organizations', 'cities', 'city', 'categories', 'category'));
            }
        }

        abort(404);
    }

    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('looking_for');

        return Category::where('name', 'like', "%{$query}%")
            ->pluck('name');
    }
}
